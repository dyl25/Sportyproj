<?php

/**
 * Model athlete, contient les méthodes d'accès et de manipulations
 *
 * @author Dylan Vansteenacker
 */
class Athlete_model extends MY_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    protected $table = 'athletes';

    /**
     * Recherche un club par son id
     * @param string $option Le nom de colonne sur laquelle faire la recherche.
     * @param mixed $value La valeur à recherchée.
     * @throws DomainException si $option ne fait pas partie de $allowedOption
     * @see $allowedOption
     */
    public function getBy($option, $value) {

        $allowedOptions = ['id', 'user_id'];

        if (!in_array($option, $allowedOptions)) {
            throw new DomainException("L'option ne se trouve pas dans celles autorisées");
        }

        return $this->db->select('athletes.*, clubs.name, category_athlete.name')
                        ->join('clubs', 'clubs.id = athletes.club_id')
                        ->join('category_athlete', 'category_athlete.id = athletes.category_id')
                        ->get_where($this->table, [$this->table . '.' . $option => $value])
                        ->row();
    }

    /**
     * Récupère tous les athletes.
     * @param mixed $limit Une limite de resultats
     * @return array Un tableau contenant tous les athletes.
     * @author Dylan Vansteenacker
     */
    public function getAthletes($limit = null) {

        $this->db->select('athletes.*, users.login as athleteName')
                ->join('users', 'users.id = athletes.user_id');

        return $this->db->get($this->table, $limit)->result_object();
    }

}
