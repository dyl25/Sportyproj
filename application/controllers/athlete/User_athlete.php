<?php

/**
 * Controler des utilisateurs pour le backoffice
 *
 * @author Dylan Vansteenacker
 */
class User_athlete extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('user_model');
        $this->load->model('athlete_model');

        if (!$this->session->userdata['id']) {
            redirect('login', 'location', 301);
        }

        if ($this->user_model->isRole($this->session->userdata['id'], 'user')) {
            redirect('accueil', 'location', 301);
        }
    }

    private function uploadPicture() {
        $config['upload_path'] = './assets/images/upload/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = 1024;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {
            return false;
        }

        return $this->upload->data('file_name');
    }

    /**
     * Prépare un utilisateur pour son ajout ou edition
     * @param array $postData Les champs de formulaire envoyé.
     * @param string $method La metode d'ajout ou de modification
     * @param bool $upload Il y a-t-il une image à upload
     * @param int $id L'id de l'utilisateur pour update
     * @return string Le message et le status de l'ajout ou la modification
     */
    private function prepareUser($id, $upload = false) {
        $dataDb['profile_image'] = null;
        if ($upload) {

            $dataDb['profile_image'] = $this->uploadPicture();

            if (!$dataDb['profile_image']) {
                return [
                    'msg' => "Il y a eu un problème lors du téléchargement de l'image : " . $this->upload->display_errors(''),
                    'status' => 'error'
                ];
            }
        }

        $dataDb['login'] = $this->input->post('login');
        $dataDb['email'] = $this->input->post('email');
        if ($this->input->post('password')) {
            $dataDb['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        }

        $where = ['id' => $id];
        if (!$this->user_model->update($where, $dataDb)) {
            $msg = "Problème lors de la modification dans la base de donnée";
            $status = 'error';
        } else {
            $msg = "L'utilisateur a bien été modifié !";
            $status = 'success';
        }
        return [
            'msg' => $msg,
            'status' => $status,
        ];
    }

    /**
     * Edition d'un utilisateur.
     * @param type $id
     */
    public function edit() {
        $this->load->model('athlete_model');
        try {
            $data['user'] = $this->user_model->getBy('id', $this->session->userdata['id']);
        } catch (DomainException $e) {
            show_404();
        }

        //on verifie que c'est bien l'athlete récupéré
        /* if ($data['route']->user_id != $this->session->userdata['id']) {
          redirect('athlete/map_athlete', 'location', 301);
          } */

        $this->load->helper('form');

        $data['title'] = 'Edition d\'un utilisateur';
        $data['scripts'] = [base_url() . 'assets/javascript/addAthlete.js'];
        $data['attributes'] = [
            'class' => 'col s12'
        ];


        $this->form_validation->set_rules('login', 'login', 'required|min_length[3]|trim');
        $this->form_validation->set_rules('email', 'e-mail', 'required|trim');
        $this->form_validation->set_rules('password', 'mot de passe', 'trim|min_length[3]');
        $this->form_validation->set_rules('passwordVerif', 'vérification du mot de passe', 'matches[password]|trim');

        if ($this->form_validation->run() == true) {
            //determine si une image est uploadee
            $upload = $_FILES['image']['size'] > 0;

            $data['notification'] = $this->prepareUser($data['user']->id, $upload);
        }

        $data['content'] = [$this->load->view('athlete/user/edit', $data, true)];
        $this->load->view('athlete/layout_athlete', $data);
    }

    /**
     * Présente les infos d'un athlete
     * @param int $id L'id de l'athlete
     */
    public function view() {
        try {
            $data['athlete'] = $this->athlete_model->getCompleteData('user_id', $this->session->userdata['id']);
        } catch (DomainException $e) {
            //show_404();
        }

        $data['title'] = 'Profil: '.html_escape($data['athlete']->login);

        $data['content'] = [$this->load->view('athlete/user/view', $data, true)];
        $this->load->view('athlete/layout_athlete', $data);
    }

}
