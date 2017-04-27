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

    /**
     * Prépare à l'ajout d'un utilisateur sans image
     * @param array $postData Les données envoyées par formulaire.
     * @return array Un tableau servant pour connaitre le status de l'ajout
     */
    private function whithoutImage(array $postData) {
        $login = trim($postData['login']);
        $email = trim($postData['email']);
        $password = $postData['password'];
        $role_id = $postData['role'];

        if (!$this->user_model->createUser($login, $role_id, $password, $email)) {
            $msg = "Problème lors de l'ajout dans la base de donnée";
            $status = 'error';
        } else {
            $msg = "L'utilisateur a bien été ajouté !";
            $status = 'success';
        }

        return [
            'msg' => $msg,
            'status' => $status,
        ];
    }

    /**
     * Prépare à l'ajout d'un utilisateur avec image de profile et avec les configuration pour
     * l'upload.
     * @param array $postData Les données envoyées par formulaire.
     * @return array Un tableau servant pour connaitre le status de l'ajout
     */
    private function whitImage(array $postData) {
        $config['upload_path'] = './assets/images/upload/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = 1024;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {
            $msg = "Il y a eu un problème lors du téléchargement de l'image : " . $this->upload->display_errors('');
            $status = 'error';
        } else {
            $imageName = $this->upload->data('file_name');

            $login = trim($postData['login']);
            $email = trim($postData['email']);
            $password = $postData['password'];
            $role_id = $postData['role'];

            if (!$this->user_model->createUser($login, $role_id, $password, $email, $imageName)) {
                $msg = "Problème lors de l'ajout dans la base de donnée";
                $status = 'error';
            } else {
                $msg = "L'utilisateur a bien été ajouté !";
                $status = 'success';
            }
        }

        return [
            'msg' => $msg,
            'status' => $status,
        ];
    }

    /**
     *  Ajoute un utilistauer
     */
    public function add() {

        $this->load->helper('form');
        $this->load->model('role_model');

        $data['title'] = 'Ajout d\'un utilisateur';
        $data['attributes'] = [
            'class' => 'col s12'
        ];
        $data['roles'] = $this->role_model->getRoles();

        $this->form_validation->set_rules('login', 'login', 'required|min_length[3]|is_unique[users.login]');
        $this->form_validation->set_rules('email', 'e-mail', 'required|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'mot de passe', 'required');
        $this->form_validation->set_rules('passwordVerif', 'vérification du mot de passe', 'required|matches[password]');
        $this->form_validation->set_rules('role', 'role', 'required');

        if ($this->form_validation->run() == true) {
            if ($_FILES['image']['size'] > 0) {

                $data['notification'] = $this->whitImage($this->input->post());
            } else {

                $data['notification'] = $this->whithoutImage($this->input->post());
            }
        }

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
        $this->load->helper('form');
        $this->load->model('role_model');

        $data['title'] = 'Edition d\'un utilisateur';
        $data['attributes'] = [
            'class' => 'col s12'
        ];
        $data['roles'] = $this->role_model->getRoles();

        $data['content'] = [$this->load->view('backoffice/user/edit', $data, true)];
        $this->load->view('backoffice/layout_backoffice', $data);
    }

    public function delete($id) {
        
    }

}
