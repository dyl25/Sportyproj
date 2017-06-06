<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Resume les informations sur le backoffice
 *
 * @author Dylan Vansteenacker
 */
class Dashboard_admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');

        //before filter afin de voir si l'utilisateur peut accéder au backoffice
        if (!$this->session->userdata['login']) {
            redirect('login');
        }

        if (!$this->user_model->isRole($this->session->userdata['id'], 'admin')) {
            redirect('accueil');
        }
    }

    /**
     * Présentation de résultats
     * @param int $offset Point de départ pour la recherche de résultat pour la 
     * pagination
     */
    public function index() {

        $data['title'] = 'Dashboard de l\'espace administrateur';

        $this->load->model('article_model');
        $this->load->model('athlete_model');
        $this->load->model('result_model');

        $data['articles'] = $this->article_model->getArticles('desc', 5);
        $data['users'] = $this->user_model->getUsers('desc', 5);
        $data['results'] = $this->result_model->getResults('desc', 5);
        $data['countUsers'] = $this->user_model->count();
        $data['countArticles'] = $this->article_model->count();
        $data['countResults'] = $this->result_model->count();
        
        //On charge la vue que l'on va injecter dans le layout 
        $data['content'] = [$this->load->view('backoffice/dashboard/index', $data, true)];

        $this->load->view('backoffice/layout_backoffice', $data);
    }

}
