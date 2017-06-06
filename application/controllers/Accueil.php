<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller pour l'accueil du site
 *
 * @author Dylan Vansteenacker
 */
class Accueil extends CI_Controller {

    public function index() {

        $data['title'] = 'Une apllication innovante pour les clubs d\'athlétisme';
        $data['description'] = 'Venez découvrir le sport à travers notre club et le monde de l\'athlétisme';

        $this->load->model('article_model');
        $this->load->model('result_model');
        $this->load->model('event_model');

        $data['articles'] = $this->article_model->getArticles('desc', 6);
        $data['results'] = $this->result_model->getResults('desc', 10);
        $data['events'] = $this->event_model->getEvents('asc', 5);

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

        $data['content'] = [$this->load->view('accueil/index', $data, true)];

        $this->load->view('templates/layout', $data);
    }

}
