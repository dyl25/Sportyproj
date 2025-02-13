<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Dashboard pour les athlètes
 *
 * @author Dylan Vansteenacker
 */
class Dashboard_athlete extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');

        //before filter afin de voir si l'utilisateur peut accéder a l'espace
        if (!$this->session->userdata['login']) {
            redirect('login');
        }

        if ($this->user_model->isRole($this->session->userdata['id'], 'user')) {
            redirect('accueil');
        }
    }

    /**
     * Presentation d'informations en resume
     */
    public function index() {

        $data['title'] = ucfirst('Espace athlète');
        
        //chargement des modèles
        $this->load->model('athlete_model');
        $this->load->model('event_model');
        $this->load->model('result_model');
        
        $data['athlete'] = $this->athlete_model->getBy('user_id', $this->session->userdata['id']);
        $data['events'] = $this->event_model->getEvents('desc', 10);
        $data['results'] = $this->result_model->getByAthlete($this->session->userdata['id'], 'desc', 10);

        //On charge la vue que l'on va injecter dans le layout 
        $data['content'] = [$this->load->view('athlete/dashboard/index', $data, true)];

        $this->load->view('athlete/layout_athlete', $data);
    }

}
