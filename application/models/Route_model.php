<?php

/**
 * Model route, contient les méthodes d'accès et de manipulations
 *
 * @author Dylan Vansteenacker
 */
class Route_model extends MY_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    protected $table = 'routes';

    /**
     * Recherche un itineraire par son id
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

        return $this->db->select('routes.*')
                        ->get_where($this->table, [$this->table . '.' . $option => $value])
                        ->row();
    }

    /**
     * Récupère tous les itinéraires.
     * @param mixed $limit Une limite de resultats
     * @return array Un tableau contenant tous les resultats.
     * @author Dylan Vansteenacker
     */
    public function getRoutes($sort = 'asc', $limit = null, $offset = null) {

        $this->db->select('routes.*, users.login')
                ->join('users', 'users.id = routes.user_id');

        return $this->db->get($this->table, $limit, $offset)->result_object();
    }

}
