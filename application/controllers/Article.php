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
    public function show($slug = null) {
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

}
