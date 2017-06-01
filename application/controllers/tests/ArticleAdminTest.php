<?php

/**
 * Description of UserTest
 *
 * @author admin
 */
class ArticleAdminTest extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('unit_test');
        $this->load->model('article_model');
        $this->load->helper('text');
    }

    public function slugify() {
        

        $slug = slugify('téléchargement d\'un article');

        $expected = 'telechargement-d-un-article';

        $this->unit->run($slug == $expected, 'is_true', 'Test slugify');
        $this->load->view('tests/index');
    }

    public function createSuccess() {
        $dataDb['title'] = 'Titre de l\'article';
        $dataDb['content'] = 'Contenu';
        $dataDb['category_id'] = 3;
        $dataDb['author'] = 2;
        $dataDb['slug'] = slugify($dataDb['title']);
        
        $this->unit->run($this->article_model->create($dataDb), 'is_true', 'Test create article success');
        $this->load->view('tests/index');
    }
    
    public function createFail() {       
        $this->unit->run($this->article_model->create(), 'is_false', 'Test create article fail');
        $this->load->view('tests/index');
    }

}
