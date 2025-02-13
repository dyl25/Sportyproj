<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller pour itineraires d'entrainement
 *
 * @author Dylan Vansteenacker
 */
class Map_athlete extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('route_model');

        //before filter afin de voir si l'utilisateur peut accéder a l'espace
        if (!$this->session->userdata['login']) {
            redirect('login', 'location', 301);
        }

        if ($this->user_model->isRole($this->session->userdata['id'], 'user')) {
            redirect('accueil', 'location', 301);
        }
    }

    /**
     * Presentation des itineraires d'entrainement
     */
    public function index() {
        $data['title'] = 'Gestion des itinéraires';
        $data['routes'] = $this->route_model->getRoutes();
        $data['content'] = [$this->load->view('athlete/map/index', $data, true)];

        $this->load->view('athlete/layout_athlete', $data);
    }

    /**
     * Ajout d'un itineraire par l'athlete.
     */
    public function add() {
        $data['title'] = 'Ajout d\'un itinéraire';
        $data['scripts'] = [base_url() . 'assets/javascript/map/mapManager.js'];
        $data['customSrc'] = ['<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0TU9NGsHH2srdTO8JBU3lLAhTC4OOGqY&callback=initMap"></script>'];

        $this->form_validation->set_error_delimiters('');
        $this->form_validation->set_rules('geoJsonInput', 'champ geoJson', 'trim|required', ['required' => "Veuillez dessiner un itinéraire."]);
        $this->form_validation->set_rules('routeName', 'nom de l\'itinéraire', 'trim|required');

        if ($this->form_validation->run() == true) {
            if ($this->route_model->canCreate($this->session->userdata['id'])) {
                $dataDb['user_id'] = $this->session->userdata['id'];
                $dataDb['coord'] = $this->input->post('geoJsonInput');
                $dataDb['name'] = $this->input->post('routeName');

                if ($this->route_model->create($dataDb)) {
                    $msg = "L'itinéraire a bien été ajouté !";
                    $status = 'success';
                } else {
                    $msg = "Un problème s'est passé lors de l'ajout dans la base du données du club.";
                    $status = 'error';
                }
            } else {
                $msg = "Vous avez atteint le nombre maximum d'itinéraire créable.";
                $status = 'error';
            }
            $this->session->set_flashdata('notification', [
                'msg' => $msg,
                'status' => $status,
            ]);
            redirect('athlete/map_athlete', 'location', 301);
        }

        $data['content'] = [$this->load->view('athlete/map/add', $data, true)];
        $this->load->view('athlete/layout_athlete', $data);
    }

    /**
     * Vue sur l'itineraire en question
     * @param int $id L'id de l'itineraire
     */
    public function view($id = null) {

        try {
            $data['route'] = $this->route_model->getBy('id', $id);
        } catch (DomainException $e) {
            show_404();
        }

        $data['title'] = 'Vue d\'un itinéraire';
        $data['scripts'] = [base_url() . 'assets/javascript/map/mapManagerView.js'];
        $geoJson = $data['route']->coord;
        $data['customSrc'] = ["<script>var userGeoJsonData = " . $geoJson . ";</script>",
            '<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0TU9NGsHH2srdTO8JBU3lLAhTC4OOGqY&callback=initMap"></script>'];
        $data['content'] = [$this->load->view('athlete/map/view', $data, true)];
        $this->load->view('athlete/layout_athlete', $data);
    }

    /**
     * Modification d'un itineraire
     * @param int $id l'itineraire à modifier
     */
    public function edit($id = null) {

        try {
            $data['route'] = $this->route_model->getBy('id', $id);
        } catch (DomainException $e) {
            show_404();
        }
        //on verifie que c'est bien l'athlete qui l'a créé
        if ($data['route']->user_id != $this->session->userdata['id']) {
            redirect('athlete/map_athlete', 'location', 301);
        }

        $data['title'] = 'Modification d\'un itinéraire';
        $data['scripts'] = [base_url() . 'assets/javascript/map/mapManagerEdit.js'];
        $geoJson = $data['route']->coord;
        $data['customSrc'] = ['<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0TU9NGsHH2srdTO8JBU3lLAhTC4OOGqY&callback=initMap"></script>', "<script>var userGeoJsonData = " . $geoJson . ";</script>",
        ];

        $this->form_validation->set_error_delimiters('');
        $this->form_validation->set_rules('geoJsonInput', 'champ geoJson', 'trim|required', ['required' => "Veuillez dessiner un itinéraire."]);
        $this->form_validation->set_rules('routeName', 'nom de l\'itinéraire', 'trim|required', ['required' => "Veuillez donner un nom à l'itinéraire"]);

        if ($this->form_validation->run() == true) {
            $dataDb['user_id'] = $this->session->userdata['id'];
            $dataDb['coord'] = $this->input->post('geoJsonInput');
            $dataDb['name'] = $this->input->post('routeName');

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
            redirect('athlete/map_athlete', 'location', 301);
        }

        $data['content'] = [$this->load->view('athlete/map/edit', $data, true)];
        $this->load->view('athlete/layout_athlete', $data);
    }

    /**
     * Supprime un itineraire si l'athlete en est l'auteur
     * @param int $id L'id de l'itineraire.
     */
    public function delete($id) {

        try {
            $data['route'] = $this->route_model->getBy('id', $id);
        } catch (DomainException $e) {
            show_404();
        }

        //on verifie que c'est bien l'athlete qui l'a créé
        if ($data['route']->user_id != $this->session->userdata['id']) {
            redirect('athlete/map_athlete', 'location', 301);
        }

        if ($this->route_model->delete(['id' => $id])) {
            $msg = "Itinéraire supprimé !";
            $status = "success";
        } else {
            $msg = "Problème lors de la suppression dans la base de donnée";
            $status = "error";
        }


        $this->session->set_flashdata('notification', [
            'msg' => $msg,
            'status' => $status,
        ]);

        redirect('athlete/map_athlete', 'location', 301);
    }

}
