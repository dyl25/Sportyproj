<?php

/**
 * Model demande, contient les méthodes d'accès et de manipulations
 *
 * @author Dylan Vansteenacker
 */
class Demande_model extends MY_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    protected $table = 'demandes';

    /**
     * Recherche un evenement par son id
     * @param string $option Le nom de colonne sur laquelle faire la recherche.
     * @param mixed $value La valeur à recherchée.
     * @throws DomainException si $option ne fait pas partie de $allowedOption
     * @see $allowedOption
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
     * Récupère toutes les demandes.
     * @param mixed $limit Une limite de resultats
     * @param array $where Un tableau de condition pour la recuperation
     * @return array Un tableau contenant toutes les demandes.
     * @author Dylan Vansteenacker
     */
    public function getDemandes($limit = null) {

        $this->db->select('demandes.*, users.login, users.email, category_athlete.name as categoryName')
                ->join('users', 'users.id = demandes.user_id')
                ->join('category_athlete', 'category_athlete.id = demandes.category_id');

        return $this->db->get($this->table, $limit)->result_object();
    }

}
