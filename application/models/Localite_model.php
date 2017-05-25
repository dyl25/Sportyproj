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
     * Recherche un article par son id ou son slug
     * @param string $option Le nom de colonne sur laquelle faire la recherche.
     * @param mixed $value La valeur à recherchée.
     * @throws DomainException si $option ne fait pas partie de $allowedOption
     * @see $allowedOption
     */
    public function getBy($option, $value) {

        $allowedOptions = ['id', 'slug'];

        if (!in_array($option, $allowedOptions)) {
            throw new DomainException("L'option ne se trouve pas dans celles autorisées");
        }

        if ($option == 'slug') {
            if (is_null($value)) {
                throw new InvalidArgumentException('Type incorrect: '
                . gettype($value) . ' donné, string attendu');
            }
        }

        return $this->db->select('articles.*, users.login')
                        ->join('users', 'users.id = articles.author')
                        ->get_where($this->table, [$this->table . '.' . $option => $value])
                        ->row();
    }

    /**
     * Récupère tous les articles.
     * @return array Un tableau contenant tous les articles.
     * @author Dylan Vansteenacker
     */
    public function getLocalites($limit = null) {

        $this->db->select('localites.*');

        return $this->db->get($this->table, $limit)->result_object();
    }

}
