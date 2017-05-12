<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller pour les commentaires
 *
 * @author Dylan Vansteenacker
 */
class Comment extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Comment_model');
    }

    /**
     * Affchage de tous les articles disponiblent
     */
    public function Add() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('commentContent', 'commentaire', 'trim|required');
        $this->form_validation->set_rules('userId', 'id utilisateur', 'required|numeric|is_natural_no_zero');
        $this->form_validation->set_rules('articleId', 'id article', 'required|numeric|is_natural_no_zero');

        if ($this->form_validation->run() == true) {
            $dataDb['content'] = $this->input->post('commentContent');
            $dataDb['author_id'] = $this->input->post('userId');
            $dataDb['article_id'] = $this->input->post('articleId');

            if ($this->comment_model->create($dataDb)) {
                $data['content'] = [$this->load->view('article/view', $data, true)];

                $this->load->view('templates/layout', $data);
            } else {
                
            }
        }
    }

}
