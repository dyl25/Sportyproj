<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller pour les resultats
 *
 * @author Dylan Vansteenacker
 */
class Result_athlete extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('result_model');

        //before filter afin de voir si l'utilisateur peut accéder au backoffice
        if (!$this->session->userdata['login']) {
            redirect('login', 'location', 301);
        }

        if ($this->user_model->isRole($this->session->userdata['id'], 'user')) {
            redirect('accueil', 'location', 301);
        }
    }

    /**
     * Determine le type de résultat
     * @param string $type Le type d'epreuve
     * @return string Le type de resultat
     */
    private function getResultType($type) {
        switch ($type) {
            case 'course':
                $resultType = 'time';
                break;
            case 'marche':
                $resultType = 'time';
                break;
            case 'saut':
                $resultType = 'dist';
                break;
            case 'lancer':
                $resultType = 'dist';
                break;
            case 'épreuves combinées':
                $resultType = 'points';
                break;
        }

        return $resultType;
    }

    /**
     * Presentation des resultats de l'athlete
     */
    public function index() {
        $data['title'] = 'Résultats réalisés';
        $data['results'] = $this->result_model->getByAthlete($this->session->userdata['id']);
        $data['content'] = [$this->load->view('athlete/result/index', $data, true)];

        $this->load->view('athlete/layout_athlete', $data);
    }

}
