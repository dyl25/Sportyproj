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
     * Recherche une demande par son id
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

        return $this->db->select('demandes.*')
                        ->get_where($this->table, [$this->table . '.' . $option => $value])
                        ->row();
    }

    /**
     * Récupère toutes les demandes.
     * @param string $sort Le type de tri
     * @param int $limit La limite de résultats
     * @param int $offset De où commencer la récupération
     * @return array Un tableau contenant toutes les demandes.
     * @author Dylan Vansteenacker
     */
    public function getDemandes($sort = 'asc', $limit = null, $offset = null) {

        $this->db->select('demandes.*, users.login, users.email, category_athlete.name as categoryName')
                ->join('users', 'users.id = demandes.user_id')
                ->join('category_athlete', 'category_athlete.id = demandes.category_id')
                ->order_by('demandes.id', $sort);

        return $this->db->get($this->table, $limit, $offset)->result_object();
    }

    /**
     * Vérifie si un utilisateur peur refaire une demande après un refus
     */
    public function requestAuthorized($userId) {
        $lastRequest = $this->db
                ->limit(1)
                ->select('demandes.creation_date')
                ->where('demandes.user_id', $userId)
                ->get($this->table);
        
        if ($lastRequest->num_rows() == 0) {
            return true;
        }

        $lastRequest = $lastRequest->row('creation_date');

        //convertion à partir d'un string
        $lastRequest = new DateTime($lastRequest);
        $lastRequest->modify('+30 minutes');

        $now = new DateTime();
        //on vérifie que 15 minutes soient bien passée
        return $lastRequest <= $now;
    }

    /**
     * Confirme que la demande a été traitée
     */
    public function denyRequest($id) {
        $dataDb['processed'] = 1;
        return $this->update(['id' => $id], $dataDb);
    }

    /**
     * Vérifie si une demande a déjà été traitée
     * @param type $userId
     * @return type
     */
    public function requestProcessed($userId) {
        $processed = $this->db
                ->limit(1)
                ->select('demandes.processed')
                ->where('demandes.user_id', $userId)
                ->get($this->table)
                ->row('processed');

        return (bool) $processed;
    }

    public function getDate($userId) {
        $date = $this->db
                ->limit(1)
                ->select('demandes.creation_date')
                ->where('demandes.user_id', $userId)
                ->get($this->table)
                ->row('creation_date');
        
        return $date;
    }
}
