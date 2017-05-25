<?php

/**
 * Model club, contient les méthodes d'accès et de manipulations
 *
 * @author Dylan Vansteenacker
 */
class CategoryAthlete_model extends MY_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    protected $table = 'category_athlete';

    /**
     * Recherche un club par son id
     * @param string $option Le nom de colonne sur laquelle faire la recherche.
     * @param mixed $value La valeur à recherchée.
     * @throws DomainException si $option ne fait pas partie de $allowedOption
     * @see $allowedOption
     */
    public function getBy($option, $value) {

        $allowedOptions = ['id'];

        if (!in_array($option, $allowedOptions)) {
            throw new DomainException("L'option ne se trouve pas dans celles autorisées");
        }

        return $this->db->select('clubs.*, localites.postcode, localites.city')
                        ->join('localites', 'localites.id = clubs.localite_id')
                        ->get_where($this->table, [$this->table . '.' . $option => $value])
                        ->row();
    }

    /**
     * Récupère tous les clubs.
     * @param mixed $limit Une limite de resultats
     * @return array Un tableau contenant tous les articles.
     * @author Dylan Vansteenacker
     */
    public function getCategories($limit = null) {

        $this->db->select('category_athlete.*');

        return $this->db->get($this->table, $limit)->result_object();
    }

}
