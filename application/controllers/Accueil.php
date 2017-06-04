<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Accueil
 *
 * @author admin
 */
class Accueil extends CI_Controller {

    public function index() {

        $data['title'] = 'Une apllication innovante pour les clubs d\'athlétisme';
        $data['description'] = 'Venez découvrir le sport à travers notre club et le monde de l\'athlétisme';
        
        $this->load->model('article_model');
        $this->load->model('result_model');
        $this->load->model('event_model');
        
        $data['articles'] = $this->article_model->getArticles(6);
        $data['results'] = $this->result_model->getResults(10);
        $data['events'] = $this->event_model->getEvents(5);

        $data['content'] = [$this->load->view('accueil/index', $data, true)];

        $this->load->view('templates/layout', $data);
    }

}
