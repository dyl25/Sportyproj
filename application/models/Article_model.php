<?php

/**
 * Model articles, contient les méthodes d'accès et de manipulations de la table 
 * articles
 *
 * @author admin
 */
class Article_model extends MY_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    //sera accessible pour le parent
    protected $table = 'articles';

    /**
     * Recherche un article par son id ou son slug
     * @param string $option Le nom de colonne sur laquelle faire la recherche.
     * @param mixed $value La valeur à recherchée.
     * @throws DomainException si $option ne fait pas partie de $allowedOption
     * @see $allowedOption
     */
    public function getBy($option, $value) {

        $allowedOptions = ['id', 'slug'];

        if (!in_array($option, $allowedOptions)) {
            throw new DomainException("L'option ne se trouve pas dans celles autorisées");
        }

        if ($option == 'slug') {
            if (is_null($value)) {
                throw new InvalidArgumentException('Type incorrect: '
                . gettype($value) . ' donné, string attendu');
            }
        }

        return $this->db->select('articles.*, users.login')
                        ->join('users', 'users.id = articles.author')
                        ->get_where($this->table, [$this->table . '.' . $option => $value])
                        ->row();
    }

    /**
     * Récupère tous les articles.
     * @param string $sort Le type de tri
     * @param int $limit La limite de résultats
     * @param int $offset De où commencer la récupération
     * @return array Un tableau contenant tous les articles.
     * @author Dylan Vansteenacker
     */
    public function getArticles($sort = 'asc',$limit = null, $offset = null) {

        $this->db->select('articles.*, users.login')
                ->join('users', 'users.id = articles.author')
                ->order_by('articles.id', $sort);
        return $this->db->get($this->table, $limit, $offset)->result_object();
    }

}
