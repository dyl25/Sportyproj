<?php

/**
 * Controler des utilisateurs pour le backoffice
 *
 * @author Dylan Vansteenacker
 */
class User_admin extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('user_model');

        if (!$this->session->userdata['id']) {
            redirect('login');
        }

        if (!$this->user_model->isAdmin($this->session->userdata['id'])) {
            redirect('accueil');
        }
    }

    public function index() {
        $data['title'] = 'Gestion des utilisateurs';
        $data['users'] = $this->user_model->getUsers();
        $data['content'] = [$this->load->view('backoffice/user/index', $data, true)];
        $this->load->view('backoffice/layout_backoffice', $data);
    }

    public function add() {
        $data['title'] = 'Ajout d\'un article';

        $data['content'] = [$this->load->view('backoffice/user/add', $data, true)];
        $this->load->view('backoffice/layout_backoffice', $data);
    }

    public function view($id) {
        
    }

    public function edit($id) {
        try {
            $data['user'] = $this->user_model->getBy('id', $id);
        } catch (DomainException $e) {
            show_404();
        }

        $data['title'] = 'Edition d\'un utilisateur';
        $data['attributes'] = [
            'class' => 'col s12'
        ];
    }

    public function delete($id) {
        
    }

}
