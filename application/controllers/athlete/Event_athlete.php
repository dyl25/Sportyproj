<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller pour les events de l'athlete
 *
 * @author Dylan Vansteenacker
 */
class Event_athlete extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('event_model');

        //before filter afin de voir si l'utilisateur peut accéder a l'espace
        if (!$this->session->userdata['login']) {
            redirect('login', 'location', 301);
        }

        if ($this->user_model->isRole($this->session->userdata['id'], 'user')) {
            redirect('accueil', 'location', 301);
        }
    }

    /**
     * Presentation des evenements
     */
    public function index() {
        $data['title'] = 'Evénements';

        $data['events'] = $this->event_model->getEvents();

        $data['content'] = [$this->load->view('athlete/event/index', $data, true)];
        $this->load->view('athlete/layout_athlete', $data);
    }

    /**
     * Presentation des competitions
     */
    public function competitions() {
        $data['title'] = 'Compétitions';
        $data['events'] = $this->event_model->getByType('compétition');
        $data['content'] = [$this->load->view('athlete/event/index', $data, true)];
        $this->load->view('athlete/layout_athlete', $data);
    }
    
    /**
     * Presentation des reunions
     */
    public function reunions() {
        $data['title'] = 'Réunions';
        $data['events'] = $this->event_model->getByType('réunion');
        $data['content'] = [$this->load->view('athlete/event/index', $data, true)];
        $this->load->view('athlete/layout_athlete', $data);
    }

}
