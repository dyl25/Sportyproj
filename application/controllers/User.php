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
        
        if (isset($this->session->userdata['id'])) {
            $userData['id'] = $this->session->userdata['id'];
            if ($this->user_model->isRole($userData['id'], 'admin')) {
                redirect('backoffice', 'location', 301);
            } elseif ($this->user_model->isRole($userData['id'], 'athlete')) {
                redirect('athlete', 'location', 301);
            } elseif ($this->user_model->isRole($userData['id'], 'user')) {
                redirect('accueil', 'location', 301);
            }
        }

        $this->form_validation->set_error_delimiters('');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[3]|is_unique[users.login]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('passwordVerif', 'Password verification', 'required|matches[password]');
        $this->form_validation->set_rules('email', 'E-mail', 'required|is_unique[users.email]');

        $title = 'S\'inscrire sur le site';
        $data['title'] = $title;

        $data['attributes'] = [
            'class' => 'form-horizontal'
        ];

        if ($this->form_validation->run() == true) {

            $dataDb['login'] = $this->input->post('username', true);
            $dataDb['password'] = password_hash($this->input->post('password', true), PASSWORD_DEFAULT);
            $dataDb['email'] = $this->input->post('email', true);

            if ($this->user_model->create($dataDb)) {

                $data['notification'] = [
                    'msg' => 'Vous êtes bien inscrit !',
                    'status' => 'success',
                ];
            } else {
                $data['notification'] = [
                    'msg' => 'Une erreur s\'est produite.',
                    'status' => 'error',
                ];
            }
        }
        $data['content'] = [$this->load->view('user/signup', $data, true)];
        $this->load->view('templates/layout', $data);
    }

    /**
     * Permet à l'utilisateur de se connecter
     */
    public function login() {

        if (isset($this->session->userdata['id'])) {
            $userData['id'] = $this->session->userdata['id'];
            if ($this->user_model->isRole($userData['id'], 'admin')) {
                redirect('backoffice', 'location', 301);
            } elseif ($this->user_model->isRole($userData['id'], 'athlete')) {
                redirect('athlete', 'location', 301);
            } elseif ($this->user_model->isRole($userData['id'], 'user')) {
                redirect('accueil', 'location', 301);
            }
        }

        $data['title'] = 'Se connecter à son espace personnel';

        $data['attributes'] = [
            'id' => 'signinForm'
        ];

        $this->form_validation->set_error_delimiters('');

        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('user/login', $data);
        } else {

            $email = $this->input->post('email', true);
            $password = $this->input->post('password', true);

            if ($this->user_model->checkUser($email, $password)) {
                $userData = $this->user_model->getUserData($email);
                $this->session->set_userdata($userData);
                //redirection vers l'espace associé
                if ($this->user_model->isRole($userData['id'], 'admin')) {
                    redirect('backoffice', 'location', 301);
                } elseif ($this->user_model->isRole($userData['id'], 'athlete')) {
                    redirect('athlete', 'location', 301);
                } elseif ($this->user_model->isRole($userData['id'], 'user')) {
                    redirect('accueil', 'location', 301);
                }
            } else {
                $data['notification'] = [
                    'msg' => 'E-mail ou mot de passe incorrecte',
                    'status' => 'error'
                ];
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
            'login',
            'role'
        ];

        $this->session->unset_userdata($sessions_item);

        redirect('accueil', 'location', 301);
    }

    public function contact() {

        $data['title'] = 'Toutes les informations nécessaires sur le club';
        $data['description'] = 'Informez vous sur le club.';
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

            $name = $this->input->post('user_name', true);
            $email = $this->input->post('email', true);
            $content = $this->input->post('email_content', true);

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

    public function addRequest() {

        $this->load->model('categoryAthlete_model');
        $this->load->model('demande_model');

        $data['title'] = 'Devenir un athlète';
        $data['attributes'] = [
            'class' => 'col s12'
        ];
        $data['categories'] = $this->categoryAthlete_model->getCategories();

        $this->form_validation->set_rules('registerNum', 'numéro de dossard', 'trim|required|is_natural');
        $this->form_validation->set_rules('category', 'catégorie', 'required|is_natural_no_zero');

        if ($this->form_validation->run() == true) {
            $dataDb['user_id'] = $this->session->userdata['id'];
            $dataDb['dossard'] = $this->input->post('registerNum', true);
            $dataDb['category_id'] = $this->input->post('category', true);

            if ($this->demande_model->create($dataDb)) {
                $msg = "Votre demande à bien été envoyée !";
                $status = 'success';
            } else {
                $msg = "Un problème s'est produit durant l'ajout de la demande !";
                $status = 'error';
            }
            $data['notification'] = [
                'msg' => $msg,
                'status' => $status
            ];
        }

        $data['content'] = [$this->load->view('user/addRequest', $data, true)];

        $this->load->view('templates/layout', $data);
    }

}
