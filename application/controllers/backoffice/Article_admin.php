<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller pour les articles du backoffice
 *
 * @author admin
 */
class Article_admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('article_model');

        //before filter afin de voir si l'utilisateur peut accéder au backoffice
        if (!$this->session->userdata['login']) {
            redirect('login');
        }

        if (!$this->user_model->isAdmin($this->session->userdata['id'])) {
            redirect('accueil');
        }
    }

    /**
     * Affichage spécifique pour les administarteurs des différentes commandes 
     * de gestions des articles
     */
    public function index() {
        $data['title'] = 'Gestion des articles';
        $data['articles'] = $this->article_model->getArticles();
        $data['content'] = [$this->load->view('backoffice/article/index'
                    , $data, true)];

        $this->load->view('backoffice/layout_backoffice', $data);
    }

    private function prepareArticle($method, $upload = false, $id = null) {
        $dataDb['image'] = null;
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

            $dataDb['image'] = $this->upload->data('file_name');
        }

        $dataDb['title'] = $this->input->post('title', true);
        $dataDb['content'] = $this->input->post('content', true);
        $dataDb['category_id'] = $this->input->post('category', true);
        $dataDb['author'] = $this->session->userdata('id');
        $dataDb['slug'] = url_title(iconv('utf-8', 'us-ascii//TRANSLIT'
                        , $this->input->post('title', true)), '-', true);

        if ($method == 'create') {
            if (!$this->article_model->create($dataDb)) {
                $msg = "Problème lors de l'ajout dans la base de donnée";
                $status = 'error';
            } else {
                $msg = "L'article a bien été ajouté !";
                $status = 'success';
            }
        } elseif ($method == 'update') {
            $where = ['id' => $id];
            if (!$this->article_model->update($where, $dataDb)) {
                $msg = "Problème lors de la modification dans la base de donnée";
                $status = 'error';
            } else {
                $msg = "L'article a bien été modifié !";
                $status = 'success';
            }
        }
        return [
            'msg' => $msg,
            'status' => $status,
        ];
    }

    /**
     * Ajout d'un article pour backoffice.
     */
    public function add() {

        $this->load->helper('form');
        $this->load->model('category_model');

        $data['title'] = 'Ajout d\'un article';
        $data['attributes'] = [
            'class' => 'col s12'
        ];
        $data['scripts'] = [
            base_url() . 'assets/javascript/ckeditor/ckeditor.js',
            base_url() . 'assets/javascript/ckeditorConf.js'
        ];
        $data['categories'] = $this->category_model->getCategories();

        $this->form_validation->set_rules('title', 'Titre', 'required|trim');
        $this->form_validation->set_rules('content', 'Contenu', 'required|trim');
        $this->form_validation->set_rules('category', 'catégorie', 'required');

        if ($this->form_validation->run() == true) {
            //determine si une image est uploadee
            $upload = $_FILES['image']['size'] > 0;

            $data['notification'] = $this->prepareArticle('create', $upload);
        }

        $data['content'] = [$this->load->view('backoffice/article/add', $data, true)];
        $this->load->view('backoffice/layout_backoffice', $data);
    }

    public function view($slug = null) {
        //code 301 pour dire que la redirection est permannente et non temporaire
        redirect('article/view/' . $slug, 'location', 301);
    }

    public function edit($id = null) {
        try {
            $data['article'] = $this->article_model->getBy('id', $id);
        } catch (DomainException $e) {
            show_404();
            /* echo $e->getMessage();
              exit; */
        }

        $data['title'] = 'Edition d\'un article';
        $data['attributes'] = [
            'class' => 'col s12'
        ];
        $data['scripts'] = [
            base_url() . 'assets/javascript/ckeditor/ckeditor.js',
            base_url() . 'assets/javascript/ckeditorConf.js'
        ];
        $this->load->model('category_model');
        $data['categories'] = $this->category_model->getCategories();

        $this->form_validation->set_rules('title', 'Titre', 'required');
        $this->form_validation->set_rules('content', 'Contenu', 'required');

        if ($this->form_validation->run() == true) {
            //determine si une image est uploadee
            $upload = $_FILES['image']['size'] > 0;

            $data['notification'] = $this->prepareArticle('update', $upload, $id);
        }

        $data['content'] = [$this->load->view('backoffice/article/edit', $data
                    , true)];
        $this->load->view('backoffice/layout_backoffice', $data);
    }

    /**
     * Supprime un article et son image associée si il en a une
     * @param int $id L'id de l'article.
     */
    public function delete($id) {

        try {
            //récupération de l'image de l'article
            $articleImage = $this->article_model->getBy('id', $id)->image;
        } catch (Exception $ex) {
            $msg = "Problème lors de la suppression de l'image de l'article: " . $ex->getMessage();
            $status = "error";
        }

        //suppression si image existante
        if (!is_null($articleImage) || !empty($articleImage)) {
            $fileDelete = unlink(FCPATH . "/assets/images/upload/" . $articleImage);

            if (!$fileDelete) {
                $msg = "Problème lors de la suppression de l'image de l'article.";
                $status = "error";
            }
        }

        //si il n'y a pas d'image existante ou l'image à été supprimée correctement
        if (!isset($fileDelete) || $fileDelete) {
            try {
                if ($this->article_model->delete(['id' => $id])) {

                    $msg = "Article supprimé !";
                    $status = "success";
                } else {
                    $msg = "Problème lors de la suppression dans la base de donnée";
                    $status = "error";
                }
            } catch (Exception $ex) {
                $msg = "Problème lors de la suppression de l'article: " . $ex->getMessage();
                $status = "error";
            }
        }

        $this->session->set_flashdata('notification', [
            'msg' => $msg,
            'status' => $status,
        ]);

        redirect('backoffice/article_admin', 'location', 301);
    }

}
