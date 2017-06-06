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
     * Presentation des itineraires
     * @param int $offset Point de départ pour la recherche de résultat pour la 
     * pagination
     */
    public function index($offset = 0) {
        $data['title'] = 'Gestion des itinéraires';
        $limit = 15;
        $data['routes'] = $this->route_model->getRoutes('asc', $limit, $offset);

        $this->load->library('pagination');

        //config pour la pagination
        $config['base_url'] = site_url('backoffice/map_admin/index');
        $config['total_rows'] = $this->route_model->count();
        $config['per_page'] = $limit;

        $this->pagination->initialize($config);

        $data['paginationLinks'] = $this->pagination->create_links();

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

        $this->form_validation->set_error_delimiters('');
        $this->form_validation->set_rules('geoJsonInput', 'champ geoJson', 'trim|required', ['required' => "Veuillez dessiner un itinéraire."]);
        $this->form_validation->set_rules('routeName', 'nom de l\'itinéraire', 'trim|required');

        if ($this->form_validation->run() == true) {
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
            $this->session->set_flashdata('notification', [
                'msg' => $msg,
                'status' => $status,
            ]);
        }

        $data['content'] = [$this->load->view('backoffice/map/add', $data, true)];
        $this->load->view('backoffice/layout_backoffice', $data);
    }

    /**
     * Présente les infos de l'itineraire
     * @param int $id L'id de l'itineraire
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
        }

        $data['content'] = [$this->load->view('backoffice/map/edit', $data, true)];
        $this->load->view('backoffice/layout_backoffice', $data);
    }

    /**
     * Supprime un itineraire
     * @param int $id L'id de l'itineraire.
     */
    public function delete($id) {

        try {
            if ($this->route_model->delete(['id' => $id])) {

                $msg = "Itinéraire supprimé !";
                $status = "success";
            } else {
                $msg = "Problème lors de la suppression dans la base de donnée";
                $status = "error";
            }
        } catch (Exception $ex) {
            $msg = "Problème lors de la suppression de l'itinéraire: " . $ex->getMessage();
            $status = "error";
        }

        $this->session->set_flashdata('notification', [
            'msg' => $msg,
            'status' => $status,
        ]);

        redirect('backoffice/map_admin', 'location', 301);
    }

}
