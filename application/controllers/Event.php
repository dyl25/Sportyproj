<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Accueil
 *
 * @author admin
 */
class Event extends CI_Controller {

    public function index($offset = 0) {

        $data['title'] = 'Evénement à venir';
        $data['description'] = 'Les dates importantes pour les athletes du club.';
        $limit = 10;
        $this->load->model('event_model');

        $data['events'] = $this->event_model->getEvents('asc', $limit, $offset);

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
