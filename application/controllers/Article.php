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
    }

    /**
     * Affchage de tous les articles disponiblent
     */
    public function index() {
        $data['title'] = 'Articles';
        $data['articles'] = $this->article_model->getArticles();
        $data['content'] = [$this->load->view('article/index', $data, true)];
        $this->load->view('templates/layout', $data);
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
            //echo "Une erreur s'est produite lors de la recherche: ".$e->getMessage();
            show_404();
        }

        //si aucun article trouvé
        if (empty($article)) {
            show_404();
        }

        $data['attributes'] = [
            'class' => 'col s12'
        ];

        $this->load->model('comment_model');
        $this->load->library('form_validation');

        $data['title'] = $article->title;
        $data['article'] = $article;
        $data['comments'] = $this->comment_model->getForArticle($article->id);
        /*var_dump($article);
        var_dump($data['comments']);*/

        $this->form_validation->set_rules('commentContent', 'commentaire', 'required');
        $this->form_validation->set_rules('userId', 'id utilisateur', 'required|numeric|is_natural_no_zero');
        $this->form_validation->set_rules('articleId', 'id article', 'required|numeric|is_natural_no_zero');

        if ($this->form_validation->run() == true) {
            $content = trim($this->input->post('commentContent'));
            $userId = $this->input->post('userId');
            $articleId = $this->input->post('articleId');

            if ($this->comment_model->addComment($articleId, $userId, $content)) {
                $msg = "Votre commentaire à bien été ajouté !";
                $color = "green";
                $icone = "done";
            } else {
                $msg = "Un problème est survenu. Votre commentaire n'a pas été ajouté. Veuillez réessayer.";
                $color = "red";
                $icone = "report_problem";
            }

            $data['error'] = [
                'cardColor' => $color,
                'icone' => $icone,
                'msg' => $msg
            ];
        }

        $data['content'] = [$this->load->view('article/view', $data, true)];

        $this->load->view('templates/layout', $data);
    }

}
