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
        $this->load->model('comment_model');
    }

    /**
     * Sauvegarde un commentaire
     * @param string $slug Le slug de l'article
     */
    public function store($slug) {
        $this->form_validation->set_rules('commentContent', 'commentaire', 'trim|required');
        $this->form_validation->set_rules('userId', 'id utilisateur', 'required|is_natural_no_zero');
        $this->form_validation->set_rules('articleId', 'id article', 'required|is_natural_no_zero');

        if ($this->form_validation->run() == true) {
            $dataDb['content'] = $this->input->post('commentContent');
            $dataDb['author_id'] = $this->input->post('userId');
            $dataDb['article_id'] = $this->input->post('articleId');

            if ($this->comment_model->create($dataDb)) {
                $msg = "Votre commentaire à bien été ajouté !";
                $status = 'success';
            } else {
                $msg = "Un problème est survenu. Votre commentaire n'a pas été ajouté. Veuillez réessayer.";
                $status = 'error';
            }

            $this->session->set_flashdata('notification', [
                'msg' => $msg,
                'status' => $status,
            ]);
        }
        redirect('article/show/' . $slug, 'location', 301);
    }

}
