<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller pour les clubs du backoffice
 *
 * @author Dylan Vansteenacker
 */
class Club_admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('club_model');

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
        $data['title'] = 'Gestion des clubs';
        $data['clubs'] = $this->club_model->getClubs();
        $data['content'] = [$this->load->view('backoffice/club/index', $data, true)];

        $this->load->view('backoffice/layout_backoffice', $data);
    }

    /**
     * Ajout d'un article pour backoffice.
     */
    public function add() {

        $this->load->model('localite_model');

        $data['title'] = 'Ajout d\'un club';
        $data['attributes'] = [
            'class' => 'col s12'
        ];
        $data['scripts'] = [
            base_url() . 'assets/javascript/addClub.js'
        ];
        $data['localites'] = $this->localite_model->getLocalites();

        $this->form_validation->set_rules('clubName', 'nom du club', 'required|is_unique[clubs.name]');
        $this->form_validation->set_rules('short', 'initiales', 'required');
        $this->form_validation->set_rules('address', 'adresse', 'required');
        //verification si l'utilisateur choisi une localite existante ou si il la rajoute
        if ($this->input->post('localites')) {
            $this->form_validation->set_rules('localites', 'choix de la localité', 'required');
            $insertLocalite = false;
        } else {
            $this->form_validation->set_rules('addPostcode', 'code postale', 'required|is_natural|is_unique[localites.postcode]');
            $this->form_validation->set_rules('addLocalite', 'localité', 'required|is_unique[localites.city]');
            $insertLocalite = true;
        }
        $this->form_validation->set_rules('coord', 'coordonée Google Maps', '');

        if ($this->form_validation->run() == true) {

            if ($insertLocalite) {
                $postcode = $this->input->post('addPostcode');
                $city = $this->input->post('addLocalite');
                //verif si insertion s'est bien passee
                $inserted = $this->localite_model->addLocalite($postcode, $city);
            }

            if (!$insertLocalite || ($insertLocalite && $inserted)) {
                if($inserted) {
                    $localiteId = $inserted;
                }else{
                   $localiteId = $this->input->post('localites'); 
                }
                
                $shortname = $this->input->post('short');
                $name = $this->input->post('clubName');
                $address = $this->input->post('address');
                $coord = $this->input->post('coord');

                if ($this->club_model->addClub($localiteId, $shortname, $name, $address, $coord)) {
                    $msg = "Le club a bien été ajouté !";
                    $status = 'success';
                } else {
                    $msg = "Un problème s'est passé lors de l'ajout dans la base du données du club.";
                    $status = 'error';
                }
            } else {
                $msg = "Un problème s'est passé lors de l'ajout du club.";
                $status = 'error';
            }

            $data['notification'] = [
                'msg' => $msg,
                'status' => $status,
            ];
        }

        $data['content'] = [$this->load->view('backoffice/club/add', $data, true)];
        $this->load->view('backoffice/layout_backoffice', $data);
    }

    public function view() {
        true;
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
            if ($_FILES['image']['size'] > 0 || !empty($_FILES['image']['name'])) {
                $config['upload_path'] = './assets/images/upload/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = 1024;
                $config['max_width'] = 1024;
                $config['max_height'] = 768;

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('image')) {
                    $msg = "Il y a eu un problème lors du téléchargement de l'image : " . $this->upload->display_errors('');
                    $status = 'error';
                } else {
                    $imageName = $this->upload->data('file_name');
                    $title = trim($this->input->post('title'));
                    $content = trim($this->input->post('content'));
                    $user_id = $this->session->userdata('id');

                    if (!$this->article_model->update_article($id, $user_id, $title, $content, $imageName)) {
                        $msg = "Problème lors de l'ajout dans la base de donnée";
                        $status = 'error';
                    } else {
                        $msg = "L'article a bien été ajouté !";
                        $status = 'success';
                    }
                }
            } else {
                $title = trim($this->input->post('title'));
                $content = trim($this->input->post('content'));
                $user_id = $this->session->userdata('id');
                if (!$this->article_model->update_article($id, $user_id, $title, $content)) {
                    $msg = "Problème lors de l'ajout dans la base de donnée";
                    $status = 'error';
                } else {
                    $msg = "L'article a bien été ajouté !";
                    $status = 'success';
                }
            }

            $data['notification'] = [
                'msg' => $msg,
                'status' => $status,
            ];
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
                if ($this->article_model->deleteArticle($id)) {

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
