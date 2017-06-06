<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Présentation des resultats
 *
 * @author Dylan Vansteenacker
 */
class Result extends CI_Controller {

    /**
     * presentation des resultats
     * @param int $offset Point de départ pour la recherche de résultat pour la 
     * pagination
     */
    public function index($offset = 0) {

        $data['title'] = 'Résultats des compétitions';
        $data['description'] = 'Les résultats obtenus par nos athlètes aux compétitions .';
        $limit = 15;
        $this->load->model('result_model');

        $data['results'] = $this->result_model->getResults('desc', $limit, $offset);

        $this->load->library('pagination');

        //config pour la pagination
        $config['base_url'] = site_url('result/index');
        $config['total_rows'] = $this->result_model->count();
        $config['per_page'] = $limit;

        $this->pagination->initialize($config);

        $data['paginationLinks'] = $this->pagination->create_links();

        $data['content'] = [$this->load->view('result/index', $data, true)];

        $this->load->view('templates/layout_content', $data);
    }

}
