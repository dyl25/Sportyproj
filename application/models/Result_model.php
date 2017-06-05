<?php

/**
 * Model result, contient les méthodes d'accès et de manipulations
 *
 * @author Dylan Vansteenacker
 */
class Result_model extends MY_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    protected $table = 'results';

    /**
     * Recherche un club par son id
     * @param string $option Le nom de colonne sur laquelle faire la recherche.
     * @param mixed $value La valeur à recherchée.
     * @throws DomainException si $option ne fait pas partie de $allowedOption
     * @see $allowedOption
     */
    public function getBy($option, $value) {

        $allowedOptions = ['id', 'users.id'];

        if (!in_array($option, $allowedOptions)) {
            throw new DomainException("L'option ne se trouve pas dans celles autorisées");
        }

        return $this->db->select('results.*, epreuves.name as epreuve, epreuves.type,'
                                . 'users.login as athlete, events.name as event')
                        ->join('epreuves', 'epreuves.id = results.epreuve_id')
                        ->join('athletes', 'athletes.id = results.athlete_id')
                        ->join('users', 'users.id = athletes.user_id')
                        ->join('events', 'events.id = results.event_id')
                        ->get_where($this->table, [$this->table . '.' . $option => $value])
                        ->row();
    }

    /**
     * Récupère tous les resultats.
     * @param mixed $limit Une limite de resultats
     * @return array Un tableau contenant tous les resultats.
     * @author Dylan Vansteenacker
     */
    public function getResults($sort = 'asc', $limit = null, $offset = null) {

        $this->db->select('results.*, epreuves.name as epreuve, epreuves.type,'
                        . 'users.login as athlete, events.name as event')
                ->join('epreuves', 'epreuves.id = results.epreuve_id')
                ->join('athletes', 'athletes.id = results.athlete_id')
                ->join('users', 'users.id = athletes.user_id')
                ->join('events', 'events.id = results.event_id')
                ->order_by('results.id', $sort);

        return $this->db->get($this->table, $limit, $offset)->result_object();
    }

    public function getByAthlete($id, $sort = 'asc', $limit = null) {
        return $this->db->select('results.*, epreuves.name as epreuve, epreuves.type,'
                                . 'users.login as athlete, events.name as event')
                        ->join('epreuves', 'epreuves.id = results.epreuve_id')
                        ->join('athletes', 'athletes.id = results.athlete_id')
                        ->join('users', 'users.id = athletes.user_id')
                        ->join('events', 'events.id = results.event_id')
                        ->get_where($this->table, ['results.athlete_id' => $id])
                        ->result_object();
    }

}
