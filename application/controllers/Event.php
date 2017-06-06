<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller des evenements front-office
 *
 * @author Dylan Vansteenacker
 */
class Event extends CI_Controller {

    /**
     * presentation des evenemnts
     * @param int $offset Point de départ pour la recherche de résultat pour la 
     * pagination
     */
    public function index($offset = 0) {

        $data['title'] = 'Evénement à venir';
        $data['description'] = 'Les dates importantes pour les athletes du club.';
        $limit = 10;
        $this->load->model('event_model');

        $data['events'] = $this->event_model->getEvents('desc', $limit, $offset);

        $this->load->library('pagination');

        //config pour la pagination
        $config['base_url'] = site_url('event/index');
        $config['total_rows'] = $this->event_model->count();
        $config['per_page'] = $limit;

        $this->pagination->initialize($config);

        $data['paginationLinks'] = $this->pagination->create_links();

        $data['content'] = [$this->load->view('event/index', $data, true)];

        $this->load->view('templates/layout_content', $data);
    }

    /**
     * Presentation des informations
     * @param int $id L'id du resultats
     */
    public function view($id = null) {
        $this->load->model('event_model');
        try {
            $data['event'] = $this->event_model->getBy('id', $id);
        } catch (DomainException $e) {
            show_404();
        }
        $data['title'] = $data['event']->name;
        $data['content'] = [$this->load->view('event/view', $data, true)];

        $this->load->view('templates/layout_content', $data);
    }

}
