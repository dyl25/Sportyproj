<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Dashboard pour les athlètes
 *
 * @author admin
 */
class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');

        //before filter afin de voir si l'utilisateur peut accéder au backoffice
        if (!$this->session->userdata['login']) {
            redirect('login');
        }

        if ($this->user_model->isRole($this->session->userdata['id'], 'user')) {
            redirect('accueil');
        }
    }

    public function index() {

        $data['title'] = ucfirst('Espace athlète');

        //On charge la vue que l'on va injecter dans le layout 
        $data['content'] = [$this->load->view('athlete/dashboard/index', $data, true)];

        $this->load->view('athlete/layout_athlete', $data);
    }

}
