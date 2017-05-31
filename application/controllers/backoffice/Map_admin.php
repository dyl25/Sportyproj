<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller pour itineraires
 *
 * @author Dylan Vansteenacker
 */
class Map_admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('route_model');

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
     * de gestions des articles
     */
    public function index() {
        $data['title'] = 'Gestion des itinéraires';
        $data['routes'] = $this->route_model->getRoutes();
        $data['content'] = [$this->load->view('backoffice/map/index', $data, true)];

        $this->load->view('backoffice/layout_backoffice', $data);
    }

    /**
     * Ajout d'un itineraire pour backoffice.
     */
    public function add() {
        $data['title'] = 'Ajout d\'un itinéraire';
        $data['scripts'] = [base_url() . 'assets/javascript/map/mapManager.js'];
        $data['customSrc'] = ['<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0TU9NGsHH2srdTO8JBU3lLAhTC4OOGqY&callback=initMap"></script>'];

        $this->form_validation->set_rules('geoJsonInput', 'champ geoJson', 'trim|required');
        $this->form_validation->set_rules('routeName', 'nom de l\'itinéraire', 'trim|required');

        if ($this->form_validation->run() == true) {
            $dataDb['user_id'] = $this->session->userdata['id'];
            $dataDb['coord'] = $this->input->post('geoJsonInput', true);
            $dataDb['name'] = $this->input->post('routeName', true);

            if ($this->route_model->create($dataDb)) {
                $msg = "L'itinéraire a bien été ajouté !";
                $status = 'success';
            } else {
                $msg = "Un problème s'est passé lors de l'ajout dans la base du données du club.";
                $status = 'error';
            }
            $this->session->set_flashdata('notification', [
                'msg' => $msg,
                'status' => $status,
            ]);
            redirect('backoffice/route', 'location', 301);
        }

        $data['content'] = [$this->load->view('backoffice/map/add', $data, true)];
        $this->load->view('backoffice/layout_backoffice', $data);
    }

    /**
     * Présente les infos du club
     * @param int $id L'id du club
     */
    public function view($id = null) {

        try {
            $route = $this->route_model->getBy('id', $id);
        } catch (DomainException $e) {
            show_404();
        }

        $data['title'] = 'Vue d\'un itinéraire';
        $data['scripts'] = [base_url() . 'assets/javascript/map/mapManagerView.js'];
        $geoJson = $route->coord;
        $data['customSrc'] = ["<script>var userGeoJsonData = " . $geoJson . ";</script>",
            '<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0TU9NGsHH2srdTO8JBU3lLAhTC4OOGqY&callback=initMap"></script>'];
        $data['content'] = [$this->load->view('backoffice/map/view', $data, true)];
        $this->load->view('backoffice/layout_backoffice', $data);
    }

    /**
     * Modification d'un itineraire pour backoffice.
     */
    public function edit($id = null) {

        try {
            $data['route'] = $this->route_model->getBy('id', $id);
        } catch (DomainException $e) {
            show_404();
        }

        $data['title'] = 'Modification d\'un itinéraire';
        $data['scripts'] = [base_url() . 'assets/javascript/map/mapManagerEdit.js'];
        $geoJson = $data['route']->coord;
        $data['customSrc'] = ['<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0TU9NGsHH2srdTO8JBU3lLAhTC4OOGqY&callback=initMap"></script>',"<script>var userGeoJsonData = " . $geoJson . ";</script>",
            ];

        $this->form_validation->set_rules('geoJsonInput', 'champ geoJson', 'trim|required');
        $this->form_validation->set_rules('routeName', 'nom de l\'itinéraire', 'trim|required');

        if ($this->form_validation->run() == true) {
            $dataDb['user_id'] = $this->session->userdata['id'];
            $dataDb['coord'] = $this->input->post('geoJsonInput', true);
            $dataDb['name'] = $this->input->post('routeName', true);

            if ($this->route_model->update(['id' => $id], $dataDb)) {
                $msg = "L'itinéraire a bien été modifié !";
                $status = 'success';
            } else {
                $msg = "Un problème s'est passé lors de la modification dans la base du données de l'itinéraire.";
                $status = 'error';
            }
            $this->session->set_flashdata('notification', [
                'msg' => $msg,
                'status' => $status,
            ]);
            redirect('backoffice/map_admin', 'location', 301);
        }

        $data['content'] = [$this->load->view('backoffice/map/edit', $data, true)];
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
