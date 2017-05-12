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
     * Prépare un utilisateur pour son ajout ou edition
     * @param array $postData Les champs de formulaire envoyé.
     * @param string $method La metode d'ajout ou de modification
     * @param bool $upload Il y a-t-il une image à upload
     * @param int $id L'id de l'utilisateur pour update
     * @return string Le message et le status de l'ajout ou la modification
     */
    private function prepareUser(array $postData, $method, $upload = false, $id = null) {
        $dataDb['profile_image'] = null;
        if ($upload) {
            $config['upload_path'] = './assets/images/upload/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = 1024;
            $config['max_width'] = 1024;
            $config['max_height'] = 768;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {
                $msg = "Il y a eu un problème lors du téléchargement de l'image : " . $this->upload->display_errors('');
                $status = 'error';
                return [
                    'msg' => $msg,
                    'status' => $status,
                ];
            }

            $dataDb['profile_image'] = $this->upload->data('file_name');
        }

        $dataDb['login'] = $postData['login'];
        $dataDb['email'] = $postData['email'];
        if($postData['password']) {
            $dataDb['password'] = password_hash($postData['password'], PASSWORD_DEFAULT);
        }
        $dataDb['role_id'] = $postData['role'];

        if ($method == 'create') {
            if (!$this->user_model->create($dataDb)) {
                $msg = "Problème lors de l'ajout dans la base de donnée";
                $status = 'error';
            } else {
                $msg = "L'utilisateur a bien été ajouté !";
                $status = 'success';
            }
        } elseif ($method == 'update') {
            $where = ['id' => $id];
            if (!$this->user_model->update($where, $dataDb)) {
                $msg = "Problème lors de la modification dans la base de donnée";
                $status = 'error';
            } else {
                $msg = "L'utilisateur a bien été modifié !";
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

        $this->form_validation->set_rules('login', 'login', 'required|min_length[3]|is_unique[users.login]|trim');
        $this->form_validation->set_rules('email', 'e-mail', 'required|is_unique[users.email]|trim');
        $this->form_validation->set_rules('password', 'mot de passe', 'required');
        $this->form_validation->set_rules('passwordVerif', 'vérification du mot de passe', 'required|matches[password]');
        $this->form_validation->set_rules('role', 'role', 'required');

        if ($this->form_validation->run() == true) {
            //determine si une image est uploadee
            $upload = $_FILES['image']['size'] > 0;

            $data['notification'] = $this->prepareUser($this->input->post(), 'create', $upload, $id);
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

        $this->form_validation->set_rules('login', 'login', 'required|min_length[3]|trim');
        $this->form_validation->set_rules('email', 'e-mail', 'required|trim');
        $this->form_validation->set_rules('password', 'mot de passe', 'trim|min_length[3]');
        $this->form_validation->set_rules('passwordVerif', 'vérification du mot de passe', 'matches[password]|trim');
        $this->form_validation->set_rules('role', 'role', 'required');

        if ($this->form_validation->run() == true) {
            //determine si une image est uploadee
            $upload = $_FILES['image']['size'] > 0;

            $data['notification'] = $this->prepareUser($this->input->post(), 'update', $upload, $id);
        }

        $data['content'] = [$this->load->view('backoffice/user/edit', $data, true)];
        $this->load->view('backoffice/layout_backoffice', $data);
    }

    public function delete($id) {
        try {
            //récupération de l'image de l'utilisateur
            $userImage = $this->user_model->getBy('id', $id)->profile_image;
        } catch (Exception $ex) {
            $msg = "Problème lors de la suppression de l'image de l'utilisateur: " . $ex->getMessage();
            $status = "error";
        }

        //suppression si image existante
        if (!is_null($userImage) || !empty($userImage)) {
            $fileDelete = unlink(FCPATH . "/assets/images/upload/" . $userImage);

            if (!$fileDelete) {
                $msg = "Problème lors de la suppression de l'image de l'article.";
                $status = "error";
            }
        }

        //si il n'y a pas d'image existante ou l'image à été supprimée correctement
        if (!isset($fileDelete) || $fileDelete) {
            try {
                if ($this->user_model->delete(['id' => $id])) {

                    $msg = "Utilisateur supprimé !";
                    $status = "success";
                } else {
                    $msg = "Problème lors de la suppression dans la base de donnée";
                    $status = "error";
                }
            } catch (Exception $ex) {
                $msg = "Problème lors de la suppression de l'utilisateur: " . $ex->getMessage();
                $status = "error";
            }
        }

        $this->session->set_flashdata('notification', [
            'msg' => $msg,
            'status' => $status,
        ]);

        redirect('backoffice/user_admin', 'location', 301);
    }

}
