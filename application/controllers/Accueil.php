<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Accueil
 *
 * @author admin
 */
class Accueil extends CI_Controller {

    public function index() {

        $data['title'] = ucfirst('accueil');
        
        $this->load->model('article_model');
        
        $data['articles'] = $this->article_model->getArticles(6);
        
        //$prefs['template'] = ['table_open' => '<table class="table-condensed table-bordered table-striped">'];

        /*$this->load->library('calendar', $prefs);
        $data['calendar'] = $this->calendar->generate();*/
        $data['content'] = [$this->load->view('accueil/index', $data, true)];

        $this->load->view('templates/layout', $data);
    }

}
