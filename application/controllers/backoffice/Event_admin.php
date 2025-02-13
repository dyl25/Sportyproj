<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller pour les evenements du backoffice
 *
 * @author Dylan Vansteenacker
 */
class Event_admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('event_model');

        //before filter afin de voir si l'utilisateur peut accéder au backoffice
        if (!$this->session->userdata['login']) {
            redirect('login');
        }

        if (!$this->user_model->isAdmin($this->session->userdata['id'])) {
            redirect('accueil');
        }
    }

    /**
     * Presentation des evenements
     * @param int $offset Point de départ pour la recherche de résultat pour la 
     * pagination
     */
    public function index($offset = 0) {
        $data['title'] = 'Gestion des événements';
        $limit = 15;
        $data['events'] = $this->event_model->getEvents('asc', $limit, $offset);

        $this->load->library('pagination');

        //config pour la pagination
        $config['base_url'] = site_url('backoffice/event_admin/index');
        $config['total_rows'] = $this->event_model->count();
        $config['per_page'] = $limit;

        $this->pagination->initialize($config);

        $data['paginationLinks'] = $this->pagination->create_links();

        $data['content'] = [$this->load->view('backoffice/event/index', $data, true)];
        $this->load->view('backoffice/layout_backoffice', $data);
    }

    /**
     * Ajout d'un evenement
     */
    public function add() {

        $this->load->model('localite_model');
        $this->load->model('category_model');

        $data['title'] = 'Ajout d\'un événement';
        $data['attributes'] = [
            'class' => 'col s12'
        ];
        $data['scripts'] = [
            base_url() . 'assets/javascript/addClub.js',
            base_url() . 'assets/javascript/event.js'
        ];
        $data['localites'] = $this->localite_model->getLocalites();
        $data['categories'] = $this->category_model->getCategories();

        $this->form_validation->set_rules('eventName', 'nom de l\'événement', 'trim|required|is_unique[clubs.name]');
        $this->form_validation->set_rules('eventDescription', 'description de l\'événement', 'trim|required');
        $this->form_validation->set_rules('address', 'adresse', 'trim|required');
        $this->form_validation->set_rules('category', 'catégorie', 'required|is_natural_no_zero');
        $this->form_validation->set_rules('eventDate', 'date de l\'événement', 'required|check_date');
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

                $dataDb['name'] = $this->input->post('eventName');
                $dataDb['description'] = $this->input->post('eventDescription');
                $dataDb['category_id'] = $this->input->post('category');
                $dataDb['date'] = $this->input->post('eventDate');
                $dataDb['address'] = $this->input->post('address');
                $dataDb['coord'] = $this->input->post('coord');

                if ($this->event_model->create($dataDb)) {
                    $msg = "L'événement a bien été ajouté !";
                    $status = 'success';
                } else {
                    $msg = "Un problème s'est passé lors de l'ajout dans la base du données de l'événement.";
                    $status = 'error';
                }
            } else {
                $msg = "Un problème s'est passé lors de l'ajout de l'événement.";
                $status = 'error';
            }

            $data['notification'] = [
                'msg' => $msg,
                'status' => $status,
            ];
        }

        $data['content'] = [$this->load->view('backoffice/event/add', $data, true)];
        $this->load->view('backoffice/layout_backoffice', $data);
    }

    /**
     * Modification d'un événement
     * @param int $id L'id de l'evenement
     */
    public function edit($id = null) {
        try {
            $data['event'] = $this->event_model->getBy('id', $id);
        } catch (DomainException $e) {
            show_404();
        }
        //reformatage de la date pour l'affichage
        $data['event']->date = date('Y-m-d', strtotime($data['event']->date));
        $data['title'] = 'Edition d\'un événement';
        $data['attributes'] = [
            'class' => 'col s12'
        ];

        $data['scripts'] = [
            base_url() . 'assets/javascript/addClub.js',
            base_url() . 'assets/javascript/event.js'
        ];
        $this->load->model('localite_model');
        $this->load->model('category_model');
        $data['localites'] = $this->localite_model->getLocalites();
        $data['categories'] = $this->category_model->getCategories();

        $this->form_validation->set_rules('eventName', 'nom de l\'événement', 'trim|required|is_unique[clubs.name]');
        $this->form_validation->set_rules('eventDescription', 'description de l\'événement', 'trim|required');
        $this->form_validation->set_rules('address', 'adresse', 'trim|required');
        $this->form_validation->set_rules('category', 'catégorie', 'required|is_natural');
        $this->form_validation->set_rules('eventDate', 'date de l\'événement', 'required|check_date');
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

                $dataDb['name'] = $this->input->post('eventName');
                $dataDb['description'] = $this->input->post('eventDescription');
                $dataDb['category_id'] = $this->input->post('category');
                $date = new DateTime($this->input->post('eventDate'));
                $dataDb['date'] = $date->format('Y-m-d');
                $dataDb['address'] = $this->input->post('address');
                $dataDb['coord'] = $this->input->post('coord');
                if ($this->event_model->update(['id' => $id], $dataDb)) {
                    $msg = "L'événement a bien été modifié !";
                    $status = 'success';
                } else {
                    $msg = "Un problème s'est passé lors de la mofication dans la base du données de l'événement.";
                    $status = 'error';
                }
            } else {
                $msg = "Un problème s'est passé lors de la modification de l'événement.";
                $status = 'error';
            }

            $data['notification'] = [
                'msg' => $msg,
                'status' => $status,
            ];
        }
        $data['content'] = [$this->load->view('backoffice/event/edit', $data, true)];
        $this->load->view('backoffice/layout_backoffice', $data);
    }

    /**
     * Supprime un événement
     * @param int $id L'id de l'événement.
     */
    public function delete($id) {

        if ($this->event_model->delete(['id' => $id])) {
            $msg = "Evénement supprimé !";
            $status = "success";
        } else {
            $msg = "Problème lors de la suppression dans la base de donnée";
            $status = "error";
        }

        $this->session->set_flashdata('notification', [
            'msg' => $msg,
            'status' => $status,
        ]);

        redirect('backoffice/event_admin', 'location', 301);
    }

    public function competitions() {
        $data['title'] = 'Vue des compétitions';
        $data['events'] = $this->event_model->getByType('compétition');
        $data['content'] = [$this->load->view('backoffice/event/index', $data, true)];
        $this->load->view('backoffice/layout_backoffice', $data);
    }

    public function reunions() {
        $data['title'] = 'Réunions';
        $data['events'] = $this->event_model->getByType('réunion');
        $data['content'] = [$this->load->view('backoffice/event/index', $data, true)];
        $this->load->view('backoffice/layout_backoffice', $data);
    }

    public function addCoord($id = null) {

        try {
            $data['event'] = $this->event_model->getBy('id', $id);
        } catch (DomainException $e) {
            show_404();
        }

        $data['title'] = 'Ajouter des coordonnées à une compétitions';
        $data['attributes'] = [
            'class' => 'col s12'
        ];

        $this->form_validation->set_rules('coord', 'coordonée Google Maps', 'trim|required');

        if ($this->form_validation->run() == true) {
            $dataDb['coord'] = $this->input->post('coord');

            if ($this->event_model->update(['id' => $id], $dataDb)) {
                $msg = "Les coordonées ont bien été ajoutées !";
                $status = 'success';
            } else {
                $msg = "Un problème s'est passé lors de l'ajout des coordonnées.";
                $status = 'error';
            }

            $this->session->set_flashdata('notification', [
                'msg' => $msg,
                'status' => $status,
            ]);
            redirect('backoffice/event_admin', 'location', 301);
        }

        $data['content'] = [$this->load->view('backoffice/event/addCoord', $data, true)];
        $this->load->view('backoffice/layout_backoffice', $data);
    }

}
