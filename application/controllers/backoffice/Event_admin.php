<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller pour les clubs du backoffice
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

    public function check_date($date) {
        $dateTable = explode("-", $date);

        //on vérifie que la date est bien divisé en 3
        if (sizeof($dateTable) != 3) {
            $this->form_validation->set_message('check_date', 'La %s n\'est pas valide, elle doit correspondre au format aaaa/mm/jj');
            return false;
        }

        list($year, $month, $day) = explode("-", $date);

        if (!is_numeric($day) || !is_numeric($month) || !is_numeric($year)) {
            $this->form_validation->set_message('check_date', 'La %s n\'est pas valide, elle doit correspondre au format aaaa/mm/jj');
            return false;
        }
        //on vérifie que la date existe bien
        if (!checkdate($month, $day, $year)) {
            $this->form_validation->set_message('check_date', 'La %s n\'est pas valide, elle doit correspondre au format aaaa/mm/jj');
            return false;
        }

        $userDate = new DateTime($date);
        $now = new DateTime();
        //un event ne peut pas avoir plus qu'1 an
        $expires = new DateTime('+1 year');

        if ($userDate > $now && $userDate < $expires) {
            return true;
        } else {
            $this->form_validation->set_message('check_date', 'La %s n\'est pas valide, un événement ne peut être au-delà de 1 an.');
            return false;
        }
    }

    /**
     * Affichage spécifique pour les administarteurs des différentes commandes 
     * de gestions des articles
     */
    public function index() {
        $data['title'] = 'Gestion des événements';
        $data['events'] = $this->event_model->getEvents();
        $data['content'] = [$this->load->view('backoffice/event/index', $data, true)];
        var_dump($data['events']);
        $this->load->view('backoffice/layout_backoffice', $data);
    }

    /**
     * Ajout d'un club pour backoffice.
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
        $this->form_validation->set_rules('category', 'catégorie', 'required|is_natural');
        $this->form_validation->set_rules('eventDate', 'date de l\'événement', 'required|callback_check_date');
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
                $postcode = $this->input->post('addPostcode', true);
                $city = $this->input->post('addLocalite', true);
                /* verif si insertion s'est bien passee et on utilise une methode
                 * personnalisee pour recevoir l'id de la localite inseree
                 */
                $inserted = $this->localite_model->addLocalite($postcode, $city);
                //on écrase l'ancienne valeur comme on ajoute une localite
                $dataDb['localite_id'] = $inserted;
            }

            if (!$insertLocalite || ($insertLocalite && $inserted)) {

                $dataDb['name'] = $this->input->post('eventName', true);
                $dataDb['description'] = $this->input->post('eventDescription', true);
                $dataDb['category_id'] = $this->input->post('category', true);
                $dataDb['date'] = $this->input->post('eventDate', true);
                $dataDb['address'] = $this->input->post('address', true);
                $dataDb['coord'] = $this->input->post('coord', true);

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
     * Modification d'un événement
     * @param type $id
     */
    public function edit($id = null) {
        try {
            $data['event'] = $this->event_model->getBy('id', $id);
        } catch (DomainException $e) {
            show_404();
        }
        //reformatage de la date pour l'affichage
        $data['event']->date = date( 'Y-m-d', strtotime($data['event']->date));
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
        $this->form_validation->set_rules('eventDate', 'date de l\'événement', 'required|callback_check_date');
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
            /*var_dump($this->input->post());
            die;*/
            $dataDb['localite_id'] = $this->input->post('localites', true);
            if ($insertLocalite) {
                $postcode = $this->input->post('addPostcode', true);
                $city = $this->input->post('addLocalite', true);
                /* verif si insertion s'est bien passee et on utilise une methode
                 * personnalisee pour recevoir l'id de la localite inseree
                 */
                $inserted = $this->localite_model->addLocalite($postcode, $city);
                //on écrase l'ancienne valeur comme on ajoute une localite
                $dataDb['localite_id'] = $inserted;
            }

            if (!$insertLocalite || ($insertLocalite && $inserted)) {

                $dataDb['name'] = $this->input->post('eventName', true);
                $dataDb['description'] = $this->input->post('eventDescription', true);
                $dataDb['category_id'] = $this->input->post('category', true);
                $date = new DateTime($this->input->post('eventDate', true));
                $dataDb['date'] = $date->format('Y-m-d');
                $dataDb['address'] = $this->input->post('address', true);
                $dataDb['coord'] = $this->input->post('coord', true);
                var_dump($id);
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

        try {
            if ($this->event_model->delete(['id' => $id])) {

                $msg = "Evénement supprimé !";
                $status = "success";
            } else {
                $msg = "Problème lors de la suppression dans la base de donnée";
                $status = "error";
            }
        } catch (Exception $ex) {
            $msg = "Problème lors de la suppression de l'événement: " . $ex->getMessage();
            $status = "error";
        }

        $this->session->set_flashdata('notification', [
            'msg' => $msg,
            'status' => $status,
        ]);
        
        redirect('backoffice/event_admin', 'location', 301);
    }

}
