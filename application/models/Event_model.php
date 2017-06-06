<?php

/**
 * Model event, contient les méthodes d'accès et de manipulations
 *
 * @author Dylan Vansteenacker
 */
class Event_model extends MY_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    protected $table = 'events';

    /**
     * Recherche un evenement par son id ou categorie
     * @param string $option Le nom de colonne sur laquelle faire la recherche.
     * @param mixed $value La valeur à recherchée.
     * @throws DomainException si $option ne fait pas partie de $allowedOption
     * @see $allowedOptions
     */
    public function getBy($option, $value) {

        $allowedOptions = ['id', 'category'];

        if (!in_array($option, $allowedOptions)) {
            throw new DomainException("L'option ne se trouve pas dans celles autorisées");
        }

        return $this->db->select('events.*, localites.postcode, localites.city, category.name AS categoryName')
                        ->join('localites', 'localites.id = events.localite_id')
                        ->join('category', 'category.id = events.category_id')
                        ->get_where($this->table, [$this->table . '.' . $option => $value])
                        ->row();
    }

    /**
     * Récupère tous les events.
     * @param string $sort Le type de tri
     * @param int $limit La limite de résultats
     * @param int $offset De où commencer la récupération
     * @return array Un tableau contenant tous les resultats
     */
    public function getEvents($sort = 'asc', $limit = null, $offset = null) {

        $this->db->select('events.*, localites.postcode, localites.city, category.name AS categoryName')
                ->join('localites', 'localites.id = events.localite_id')
                ->join('category', 'category.id = events.category_id')
                ->order_by('events.id', $sort);

        return $this->db->get($this->table, $limit, $offset)->result_object();
    }

    /**
     * Récupère les events par categorie
     * @param string $category Le type d'event
     * @return array Un tableau de tous les resultats
     * @throws DomainException si $category ne fait pas partie de $allowedOption
     * @see $allowedOptions
     */
    public function getByType($category) {
        $allowedOptions = ['réunion', 'compétition'];

        if (!in_array($category, $allowedOptions)) {
            throw new DomainException("L'option ne se trouve pas dans celles autorisées");
        }

        return $this->db->select('events.*, localites.postcode, localites.city, category.name AS categoryName')
                        ->join('category', 'category.id = events.category_id')
                        ->join('localites', 'localites.id = events.localite_id')
                        ->where('category.name', $category)
                        ->get($this->table)
                        ->result_object();
    }

}
