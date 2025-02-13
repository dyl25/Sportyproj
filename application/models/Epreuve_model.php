<?php

/**
 * Model epreuve, contient les méthodes d'accès et de manipulations
 *
 * @author Dylan Vansteenacker
 */
class Epreuve_model extends MY_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    protected $table = 'epreuves';

    /**
     * Recherche une epreuve par son id ou categorie
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

        return $this->db->select('events.*, localites.postcode, localites.city')
                        ->join('localites', 'localites.id = events.localite_id')
                        ->get_where($this->table, [$this->table . '.' . $option => $value])
                        ->row();
    }

    /**
     * Récupère toutes les epreuves.
     * @param mixed $limit Une limite de resultats
     * @return array Un tableau contenant tous les resultats.
     * @author Dylan Vansteenacker
     */
    public function getEpreuves($limit = null) {

        $this->db->select('epreuves.*');

        return $this->db->get($this->table, $limit)->result_object();
    }

}
