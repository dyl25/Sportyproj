<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Piste extends CI_Controller {
    public function index() {
        $data['title'] = ucfirst('piste');
        $this->load->view('templates/head', $data);
        $this->load->view('templates/header', $data);
        $this->load->view('piste/content', $data);
        $this->load->view('templates/footer');
    }
}
