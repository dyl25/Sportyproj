<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller pour les utilisateurs
 *
 * @author Dylan Vansteenacker
 */
class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('form_validation');
    }

    /**
     * Permet à l'utilisateur de s'inscrir
     */
    public function signup() {

        $this->form_validation->set_rules('username', 'Username', 'required|min_length[3]|is_unique[users.login]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('passwordVerif', 'Password verification', 'required|matches[password]');
        $this->form_validation->set_rules('email', 'E-mail', 'required|is_unique[users.email]');

        $title = ucfirst('Sign up');
        $data['title'] = $title;

        $data['attributes'] = [
            'class' => 'form-horizontal'
        ];

        if ($this->form_validation->run() == false) {
            $data['content'] = [$this->load->view('user/signup', $data, true)];
        } else {

            $login = $this->input->post('username');
            $password = $this->input->post('password');
            $email = $this->input->post('email');

            $this->user_model->createUser($login, $password, $email);

            $this->session->set_flashdata('success', 'vous êtes inscrit');

            $data['content'] = [$this->load->view('user/signup_success', '', true)];
        }

        $this->load->view('templates/layout', $data);
    }

    /**
     * Permet à l'utilisateur de se connecter
     */
    public function login() {
        $data['title'] = 'Se connecter';

        $data['attributes'] = [
            'class' => 'form-horizontal'
        ];

        $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');

        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('user/login', $data);
        } else {

            $email = $this->input->post('email');
            $password = $this->input->post('password');

            if ($this->user_model->checkUser($email, $password)) {
                $userData = $this->user_model->getUserData($email);
                $this->session->set_userdata($userData);
                redirect('backoffice', 'location', 301);
            } else {
                $this->load->view('user/login', $data);
            }
        }
    }

    /**
     * Permet à l'utilisateur de se déconnecter
     */
    public function logout() {
        $sessions_item = [
            'id',
            'login'
        ];

        $this->session->unset_userdata($sessions_item);

        redirect('accueil');
    }

    public function contact() {

        $data['title'] = 'Contact';
        $data['attributes'] = [
            'class' => 'form-horizontal'
        ];

        $this->load->library('email');

        $this->form_validation->set_rules('user_name', 'Nom', 'required');
        $this->form_validation->set_rules('email', 'E-mail', 'required');
        $this->form_validation->set_rules('email_content', 'Votre message', 'required');


        if ($this->form_validation->run() == false) {
            $data['content'] = [$this->load->view('contact/index', $data, true)];
        } else {

            $name = $this->input->post('user_name');
            $email = $this->input->post('email');
            $content = $this->input->post('email_content');

            $this->load->library('email');

            $this->email->from($email, $name);
            $this->email->to('rsathclub@gmail.com');
            $this->email->subject('Mail de contact, application Sportiproj');
            $this->email->message($content);
            $this->email->send();
            $data['content'] = [$this->load->view('contact/index', $data, true)];
        }
        $this->load->view('templates/layout', $data);
    }

}
