<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller pour les articles (front-office)
 *
 * @author Dylan Vansteenacker
 */
class Article extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('article_model');
        $this->load->model('comment_model');
    }

    /**
     * Affchage de tous les articles disponiblent
     */
    public function index($offset = 0) {
        $data['title'] = 'Toute l\'actualité du club';
        $data['description'] = 'Des articles sur la vie du club.';
        $limit = 6;
        $data['articles'] = $this->article_model->getArticles('asc', $limit, $offset);

        $this->load->library('pagination');

        //config pour la pagination
        $config['base_url'] = site_url('article/index');
        $config['total_rows'] = $this->article_model->count();
        $config['per_page'] = $limit;

        $this->pagination->initialize($config);

        $data['paginationLinks'] = $this->pagination->create_links();

        $data['content'] = [$this->load->view('article/index', $data, true)];

        $this->load->view('templates/layout_content', $data);
    }

    /**
     * Affichage d'un article grâce à son slug (titre modifié avec '-'), et 
     * gestion de l'ajout et affichage des commentaires.
     * @param string $slug Le nom de l'article
     */
    public function view($slug = null) {
        try {
            $article = $this->article_model->getBy('slug', $slug);
        } catch (Exception $e) {
            show_404();
        }

        //si aucun article trouvé
        if (empty($article)) {
            show_404();
        }

        $data['attributes'] = [
            'class' => 'col s12'
        ];

        $data['title'] = $article->title;
        $data['article'] = $article;
        $data['comments'] = $this->comment_model->getForArticle($article->id);

        $data['content'] = [$this->load->view('article/view', $data, true)];

        $this->load->view('templates/layout_content', $data);
    }

    /**
     * Sauvegarde un commentaire
     * @param string $slug Le slug de l'article
     */
    public function storeComment($slug) {

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
        redirect('article/view/' . $slug, 'location', 301);
    }

}
