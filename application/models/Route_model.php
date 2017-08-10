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

    const MAX_CREATED = 3;

    protected $table = 'routes';

    /**
     * Recherche un itineraire par son id
     * @param string $option Le nom de colonne sur laquelle faire la recherche.
     * @param mixed $value La valeur à recherchée.
     * @throws DomainException si $option ne fait pas partie de $allowedOption
     * @see $allowedOptions
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
     * @param string $sort Le type de tri
     * @param int $limit La limite de résultats
     * @param int $offset De où commencer la récupération
     * @return array Un tableau contenant tous les resultats.
     */
    public function getRoutes($sort = 'asc', $limit = null, $offset = null) {

        $this->db->select('routes.*, users.login')
                ->join('users', 'users.id = routes.user_id');

        return $this->db->get($this->table, $limit, $offset)->result_object();
    }

    /**
     * Vérifie si un utilisateur peut encore créer un itinéraire
     * @param int $userId L'id de l'utilisateur.
     */
    public function canCreate($userId) {
        $drawedRoute = $this->db
                ->select('routes.user_id')
                ->where('routes.user_id', $userId)
                ->get($this->table);

        return $drawedRoute->num_rows() < 3;
    }

}
