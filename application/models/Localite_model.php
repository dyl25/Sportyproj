<?php

/**
 * Model loaclite, contient les méthodes d'accès et de manipulations
 *
 * @author Dylan Vansteenacker
 */
class Localite_model extends MY_Model {

    protected $table = 'localites';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Ajoute une localite
     * @param int $postcode Le code postale de la localité.
     * @param string $city La ville de la localité.
     * @return mixed L'id de la localité insérée sinon false.
     */
    public function addLocalite($postcode, $city) {

        //Préparation pour l'insertion dans la DB
        $this->db->set('postcode', $postcode);
        $this->db->set('city', $city);

        $this->db->insert($this->table);

        return $this->db->insert_id();
    }

    /**
     * Récupère tous les articles.
     * @param int $limit Une limite de resultats
     * @return array Un tableau contenant tous les resultats.
     */
    public function getLocalites($limit = null) {

        $this->db->select('localites.*');

        return $this->db->get($this->table, $limit)->result_object();
    }

}
