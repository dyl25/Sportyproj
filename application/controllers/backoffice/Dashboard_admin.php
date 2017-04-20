<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Accueil
 *
 * @author admin
 */
class Dashboard_admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');

        //before filter afin de voir si l'utilisateur peut accéder au backoffice
        if (!$this->session->userdata['login']) {
            redirect('login');
        }

        if (!$this->user_model->isAdmin($this->session->userdata['id'])) {
            redirect('accueil');
        }
    }

    public function index() {

        $data['title'] = ucfirst('dashboard');

        /* $prefs['template'] =  ['table_open' => '<table class="table-condensed table-bordered table-striped">'];      
          $this->load->library('calendar', $prefs);
          $data['calendar'] = $this->calendar->generate(); */

        $this->load->model('article_model');

        $data['articles'] = $this->article_model->getArticles(10);
        $data['users'] = $this->user_model->getUsers(10);
        //On charge la vue que l'on va injecter dans le layout 
        $data['content'] = [$this->load->view('backoffice/dashboard/index', $data, true)];

        $this->load->view('backoffice/layout_backoffice', $data);
    }

}
