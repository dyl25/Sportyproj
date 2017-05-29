<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller pour les resultats du backoffice
 *
 * @author Dylan Vansteenacker
 */
class Result_admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('result_model');

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
     * de gestions des resultats
     */
    public function index() {
        $data['title'] = 'Gestion des résultats';
        $data['results'] = $this->result_model->getResults();
        $data['content'] = [$this->load->view('backoffice/result/index', $data, true)];

        $this->load->view('backoffice/layout_backoffice', $data);
    }

    /**
     * Ajout d'un resultat pour backoffice.
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
            $this->form_validation->set_rules('localites', 'choix de la localité', 'required');
            $insertLocalite = false;
        } else {
            $this->form_validation->set_rules('addPostcode', 'code postale', 'trim|required|is_natural|is_unique[localites.postcode]');
            $this->form_validation->set_rules('addLocalite', 'localité', 'trim|required|is_unique[localites.city]');
            $insertLocalite = true;
        }
        $this->form_validation->set_rules('coord', 'coordonée Google Maps', 'trim');

        if ($this->form_validation->run() == true) {
            $dataDb['localite_id'] = $this->input->post('localites', true);
            if ($insertLocalite) {
                $dataDbLoocalite['postcode'] = $this->input->post('addPostcode', true);
                $dataDbLoocalite['city'] = $this->input->post('addLocalite', true);
                //verif si insertion s'est bien passee
                $inserted = $this->localite_model->create($dataDbLoocalite);
                //on écrase l'ancienne valeur comme on ajoute une localite
                $dataDb['localite_id'] = $inserted;
            }

            if (!$insertLocalite || ($insertLocalite && $inserted)) {

                $dataDb['shortname'] = $this->input->post('short', true);
                $dataDb['name'] = $this->input->post('clubName', true);
                $dataDb['address'] = $this->input->post('address', true);
                $dataDb['coord'] = $this->input->post('coord', true);

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
     * @param type $id
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
            $this->form_validation->set_rules('localites', 'choix de la localité', 'required');
            $insertLocalite = false;
        } else {
            $this->form_validation->set_rules('addPostcode', 'code postale', 'trim|required|is_natural|is_unique[localites.postcode]');
            $this->form_validation->set_rules('addLocalite', 'localité', 'trim|required|is_unique[localites.city]');
            $insertLocalite = true;
        }
        $this->form_validation->set_rules('coord', 'coordonée Google Maps', 'trim');

        if ($this->form_validation->run() == true) {
            $dataDb['localite_id'] = $this->input->post('localites', true);
            if ($insertLocalite) {
                $dataDbLoocalite['postcode'] = $this->input->post('addPostcode', true);
                $dataDbLoocalite['city'] = $this->input->post('addLocalite', true);
                //verif si insertion s'est bien passee
                $inserted = $this->localite_model->create($dataDbLoocalite);
                //on écrase l'ancienne valeur comme on ajoute une localite
                $dataDb['localite_id'] = $inserted;
            }

            if (!$insertLocalite || ($insertLocalite && $inserted)) {

                $dataDb['shortname'] = $this->input->post('short', true);
                $dataDb['name'] = $this->input->post('clubName', true);
                $dataDb['address'] = $this->input->post('address', true);
                $dataDb['coord'] = $this->input->post('coord', true);

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
