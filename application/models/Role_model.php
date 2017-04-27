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

    const TABLE = 'roles';

    /**
     * Récupère tous les roles
     * @param type $limit
     * @return type
     */
    public function getRoles($limit = null) {
        return $this->db->get(self::TABLE, $limit)->result_object();
    }

}
