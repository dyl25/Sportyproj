<?php

/**
 * Model role, contient les méthodes d'accès et de manipulations
 * @author admin
 */
class Role_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    protected $table = 'roles';

    /**
     * Récupère tous les roles
     * @param type $limit
     * @return type
     */
    public function getRoles($limit = null) {
        return $this->db->get($this->table, $limit)->result_object();
    }

    public function getId($name) {
        return $this->db->limit(1)
                        ->select('roles.id')
                        ->get_where($this->table, [$this->table . '.name' => $name])
                        ->row()
                        ->id;
    }

}