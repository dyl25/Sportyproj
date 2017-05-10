<?php

/**
 * Model club, contient les méthodes d'accès et de manipulations
 *
 * @author Dylan Vansteenacker
 */
class Club_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    const TABLE = 'clubs';

    /**
     * Insère un club dans la DB 
     * @param int $localiteId L'id de la localité associée. 
     * @param string $shortname Les initiales du club.
     * @param string $name Le nom du club.
     * @param string $address L'adresse du club.
     * @param mixed $coord Les coordonnee google maps si il y en a.
     * @return boolean True si le club a bien été inséré sinon false.
     * @author Dylan Vansteeancker
     */
    public function addClub($localiteId, $shortname, $name, $address, $coord = null) {

        //Préparation pour l'insertion dans la DB
        $this->db->set('localite_id', $localiteId)
                ->set('shortname', $shortname)
                ->set('name', $name)
                ->set('address', $address)
                ->set('coord', $coord);

        return $this->db->insert(self::TABLE);
    }

    /**
     * Recherche un club par son id
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

        return $this->db->select('clubs.*, localites.postcode, localites.city')
                        ->join('localites', 'localites.id = clubs.localite_id')
                        ->get_where(self::TABLE, [self::TABLE . '.' . $option => $value])
                        ->row();
    }

    /**
     * Récupère tous les clubs.
     * @param mixed $limit Une limite de resultats
     * @return array Un tableau contenant tous les articles.
     * @author Dylan Vansteenacker
     */
    public function getClubs($limit = null) {

        $this->db->select('clubs.*, localites.postcode, localites.city')
                ->join('localites', 'localites.id = clubs.localite_id');

        return $this->db->get(self::TABLE, $limit)->result_object();
    }

    /**
     * Modifie un club
     * @param int $clubId L'id du club.
     * @param int $localiteId L'id de la localité associée.
     * @param string $shortname Les initiales du club
     * @param string $name Le nom du club
     * @param string $address Le nom et le numéro de la rue
     * @param string $coord Les coordonnées google maps
     * @return bool True si la modification s'est bien passée sinon false.
     */
    public function updateClub($clubId, $localiteId, $shortname, $name, $address, $coord = null) {

        //Préparation pour la modif dans la DB
        $this->db->set('localite_id', $localiteId)
                ->set('shortname', $shortname)
                ->set('name', $name)
                ->set('address', $address)
                ->set('coord', $coord)
                ->where('id', $clubId);
        return $this->db->update(self::TABLE);
    }

    /**
     * Supprime un club
     * @param int $id L'id du club.
     * @return bool True si la suppresion s'est bien passée sinon false.
     * @throws InvalidArgumentException si $id est null ou n'est pas un nombre entier.
     * @author Dylan Vansteenacker
     */
    public function deleteClub($id) {

        if (is_null($id)) {
            throw new InvalidArgumentException("L'id ne peut pas être vide");
        }

        if (!is_numeric($id)) {
            throw new InvalidArgumentException("L'id doit être un entier" . gettype($id) . " donné");
        }

        //si l'id n'est pas une chaine contenant un entier
        if (!ctype_digit($id)) {
            //2eme verif car ctype a des resultats non attendu si pas de chaine de caractère
            if (!is_int($id)) {
                throw new InvalidArgumentException("L'id doit être un entier, " . gettype($id) . " donné");
            }
        }

        return $this->db->delete(self::TABLE, ['id' => $id]);
    }

}
