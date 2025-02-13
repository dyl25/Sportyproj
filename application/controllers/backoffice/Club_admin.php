<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller pour les clubs du backoffice
 *
 * @author Dylan Vansteenacker
 */
class Club_admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('club_model');

        //before filter afin de voir si l'utilisateur peut accéder au backoffice
        if (!$this->session->userdata['login']) {
            redirect('login');
        }

        if (!$this->user_model->isAdmin($this->session->userdata['id'])) {
            redirect('accueil');
        }
    }

    /**
     * Affichage spécifique pour les administarteurs des différentes commandes 
     * de gestions des clubs
     * @param int $offset Point de départ pour la recherche de résultat pour la 
     * pagination
     */
    public function index($offset = 0) {
        $data['title'] = 'Gestion des clubs';
        $limit = 15;
        $data['clubs'] = $this->club_model->getClubs('asc', $limit, $offset);

        $this->load->library('pagination');

        //config pour la pagination
        $config['base_url'] = site_url('backoffice/club_admin/index');
        $config['total_rows'] = $this->club_model->count();
        $config['per_page'] = $limit;

        $this->pagination->initialize($config);

        $data['paginationLinks'] = $this->pagination->create_links();
        $data['content'] = [$this->load->view('backoffice/club/index', $data, true)];

        $this->load->view('backoffice/layout_backoffice', $data);
    }

    /**
     * Ajout d'un club pour backoffice.
     */
    public function add() {

        $this->load->model('localite_model');

        $data['title'] = 'Ajout d\'un club';
        $data['attributes'] = [
            'class' => 'col s12'
        ];
        $data['scripts'] = [
            base_url() . 'assets/javascript/addClub.js'
        ];
        $data['localites'] = $this->localite_model->getLocalites();

        $this->form_validation->set_rules('clubName', 'nom du club', 'trim|required|is_unique[clubs.name]');
        $this->form_validation->set_rules('short', 'initiales', 'trim|required');
        $this->form_validation->set_rules('address', 'adresse', 'trim|required');
        //verification si l'utilisateur choisi une localite existante ou si il la rajoute
        if ($this->input->post('localites')) {
            $this->form_validation->set_rules('localites', 'choix de la localité', 'required|is_natural_no_zero');
            $insertLocalite = false;
        } else {
            $this->form_validation->set_rules('addPostcode', 'code postale', 'trim|required|is_natural|is_unique[localites.postcode]');
            $this->form_validation->set_rules('addLocalite', 'localité', 'trim|required|is_unique[localites.city]');
            $insertLocalite = true;
        }
        $this->form_validation->set_rules('coord', 'coordonée Google Maps', 'trim');

        if ($this->form_validation->run() == true) {
            $dataDb['localite_id'] = $this->input->post('localites');
            if ($insertLocalite) {
                $postcode = $this->input->post('addPostcode');
                $city = $this->input->post('addLocalite');
                /* verif si insertion s'est bien passee et on utilise une methode
                 * personnalisee pour recevoir l'id de la localite inseree
                 */
                $inserted = $this->localite_model->addLocalite($postcode, $city);
                //on écrase l'ancienne valeur comme on ajoute une localite
                $dataDb['localite_id'] = $inserted;
            }

            if (!$insertLocalite || ($insertLocalite && $inserted)) {

                $dataDb['shortname'] = $this->input->post('short');
                $dataDb['name'] = $this->input->post('clubName');
                $dataDb['address'] = $this->input->post('address');
                $dataDb['coord'] = $this->input->post('coord');

                if ($this->club_model->create($dataDb)) {
                    $msg = "Le club a bien été ajouté !";
                    $status = 'success';
                } else {
                    $msg = "Un problème s'est passé lors de l'ajout dans la base du données du club.";
                    $status = 'error';
                }
            } else {
                $msg = "Un problème s'est passé lors de l'ajout du club.";
                $status = 'error';
            }

            $data['notification'] = [
                'msg' => $msg,
                'status' => $status,
            ];
        }

        $data['content'] = [$this->load->view('backoffice/club/add', $data, true)];
        $this->load->view('backoffice/layout_backoffice', $data);
    }

    /**
     * Présente les infos du club
     * @param int $id L'id du club
     */
    public function view($id = null) {
        try {
            $data['club'] = $this->club_model->getBy('id', $id);
        } catch (DomainException $e) {
            show_404();
        }

        $data['title'] = 'Vue du club ' . $data['club']->name;

        $data['content'] = [$this->load->view('backoffice/club/view', $data, true)];
        $this->load->view('backoffice/layout_backoffice', $data);
    }

    /**
     * Modification d'un club
     * @param int $id l'id du club à modifier
     */
    public function edit($id = null) {
        try {
            $data['club'] = $this->club_model->getBy('id', $id);
        } catch (DomainException $e) {
            show_404();
        }

        $data['title'] = 'Edition d\'un club';
        $data['attributes'] = [
            'class' => 'col s12'
        ];

        $data['scripts'] = [
            base_url() . 'assets/javascript/addClub.js'
        ];
        $this->load->model('localite_model');
        $data['localites'] = $this->localite_model->getLocalites();

        $this->form_validation->set_rules('clubName', 'nom du club', 'trim|required|is_unique_update[clubs.name.id.' . $data['club']->id . ']');
        $this->form_validation->set_rules('short', 'initiales', 'trim|required');
        $this->form_validation->set_rules('address', 'adresse', 'trim|required');
        //verification si l'utilisateur choisi une localite existante ou si il la rajoute
        if ($this->input->post('localites')) {
            $this->form_validation->set_rules('localites', 'choix de la localité', 'required|is_natural_no_zero');
            $insertLocalite = false;
        } else {
            $this->form_validation->set_rules('addPostcode', 'code postale', 'trim|required|is_natural|is_unique[localites.postcode]');
            $this->form_validation->set_rules('addLocalite', 'localité', 'trim|required|is_unique[localites.city]');
            $insertLocalite = true;
        }
        $this->form_validation->set_rules('coord', 'coordonée Google Maps', 'trim');

        if ($this->form_validation->run() == true) {
            $dataDb['localite_id'] = $this->input->post('localites');
            if ($insertLocalite) {
                $postcode = $this->input->post('addPostcode');
                $city = $this->input->post('addLocalite');
                /* verif si insertion s'est bien passee et on utilise une methode
                 * personnalisee pour recevoir l'id de la localite inseree
                 */
                $inserted = $this->localite_model->addLocalite($postcode, $city);
                //on écrase l'ancienne valeur comme on ajoute une localite
                $dataDb['localite_id'] = $inserted;
            }

            if (!$insertLocalite || ($insertLocalite && $inserted)) {

                $dataDb['shortname'] = $this->input->post('short');
                $dataDb['name'] = $this->input->post('clubName');
                $dataDb['address'] = $this->input->post('address');
                $dataDb['coord'] = $this->input->post('coord');

                if ($this->club_model->update(['id' => $id], $dataDb)) {
                    $msg = "Le club a bien été modifié !";
                    $status = 'success';
                } else {
                    $msg = "Un problème s'est passé lors de la mofication dans la base du données du club.";
                    $status = 'error';
                }
            } else {
                $msg = "Un problème s'est passé lors de la modification du club.";
                $status = 'error';
            }

            $data['notification'] = [
                'msg' => $msg,
                'status' => $status,
            ];
        }

        $data['content'] = [$this->load->view('backoffice/club/edit', $data, true)];
        $this->load->view('backoffice/layout_backoffice', $data);
    }

    /**
     * Supprime un club
     * @param int $id L'id du club.
     */
    public function delete($id) {

        try {
            if ($this->club_model->delete(['id' => $id])) {

                $msg = "Club supprimé !";
                $status = "success";
            } else {
                $msg = "Problème lors de la suppression dans la base de donnée";
                $status = "error";
            }
        } catch (Exception $ex) {
            $msg = "Problème lors de la suppression du club: " . $ex->getMessage();
            $status = "error";
        }

        $this->session->set_flashdata('notification', [
            'msg' => $msg,
            'status' => $status,
        ]);

        redirect('backoffice/club_admin', 'location', 301);
    }

}
