<?php

/**
 * Model club, contient les méthodes d'accès et de manipulations
 *
 * @author Dylan Vansteenacker
 */
class Club_model extends MY_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    protected $table = 'clubs';

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
    public function getClubs($sort = 'asc',$limit = null, $offset = null) {

        $this->db->select('clubs.*, localites.postcode, localites.city')
                ->join('localites', 'localites.id = clubs.localite_id');

        return $this->db->get($this->table, $limit, $offset)->result_object();
    }

}
