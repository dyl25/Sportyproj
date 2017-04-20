<?php

/**
 * Description of Comment_model
 *
 * @author admin
 */
class Comment_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    const TABLE = 'comments';

    /**
     * Ajoute à un article le commentaire d'un utilisateur.
     * @param int $articleId L'id de l'article.
     * @param int $authorId L'id de l'auteur du commentaire.
     * @param string $content Le contenu de l'article.
     * @return boolean True si le commentaire a été ajouté sinon false.
     */
    public function addComment($articleId, $authorId, $content) {

        $this->db->set('article_id', $articleId);
        $this->db->set('author_id', $authorId);
        $this->db->set('content', $content);

        return $this->db->insert(self::TABLE);
    }

    /**
     * Récupère les commentaire pour un article donné.
     * @param int $articleId L'id de l'article pour lequel cherché.
     * @return boolean True si la recherche s'est bien passée sinon false.
     */
    public function getForArticle($articleId) {
        return $this->db->select('comments.content, comments.creation_date, users.login')
                ->join('users', 'users.id = comments.author_id')
                ->get_where(self::TABLE, [self::TABLE.'.article_id' => $articleId])
                ->result_object();
    }
}
