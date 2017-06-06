<?php

/**
 * Model comment
 *
 * @author admin
 */
class Comment_model extends MY_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    protected $table = 'comments';

    /**
     * Récupère les commentaire pour un article.
     * @param int $articleId L'id de l'article.
     * @return array Un tableau de resultats.
     */
    public function getForArticle($articleId) {
        return $this->db->select('comments.content, comments.creation_date, users.login')
                ->join('users', 'users.id = comments.author_id')
                ->get_where($this->table, [$this->table.'.article_id' => $articleId])
                ->result_object();
    }
}
