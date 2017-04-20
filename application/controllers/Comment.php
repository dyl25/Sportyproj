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

        $this->form_validation->set_rules('commentContent', 'commentaire', 'required');
        $this->form_validation->set_rules('userId', 'id utilisateur', 'required|numeric|is_natural_no_zero');
        $this->form_validation->set_rules('commentContent', 'commentaire', 'required|numeric|is_natural_no_zero');

        if ($this->form_validation->run() == true) {
            $content = $this->input->post('commentContent');
            $userId = $this->input->post('userId');
            $articleId = $this->input->post('articleId');

            if ($this->comment_model->addComment($articleId, $userId, $content)) {
                $data['content'] = [$this->load->view('article/view', $data, true)];

                $this->load->view('templates/layout', $data);
            } else {
                
            }
        }
    }

}
