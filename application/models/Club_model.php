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
     * Insère un article dans la DB et crée un slug(titre modifié avec '-') 
     * pour l'article.
     * @param int $user_id L'id de l'utilisateur. 
     * @param string $title Le titre de l'article.
     * @param string $content Le contenu de l'article.
     * @return boolean True si l'article a bien été inséré sinon false.
     * @author Dylan Vansteeancker
     */
    public function addClub($localieId, $shortname, $name, $address, $coord=null) {

        //Préparation pour l'insertion dans la DB
        $this->db->set('localite_id', $localieId);
        $this->db->set('shortname', $shortname);
        $this->db->set('name', $name);
        $this->db->set('address', $address);
        $this->db->set('coord', $coord);

        return $this->db->insert(self::TABLE);
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
                        ->get_where(self::TABLE, [self::TABLE . '.' . $option => $value])
                        ->row();
    }

    /**
     * Récupère tous les articles.
     * @return array Un tableau contenant tous les articles.
     * @author Dylan Vansteenacker
     */
    public function getClubs($limit = null) {

        $this->db->select('clubs.*');
                //->join('localites', 'users.id = articles.author');
        return $this->db->get(self::TABLE, $limit)->result_object();
    }

    /**
     * Modifie un article
     * @author Dylan Vansteenacker
     */
    public function update_club($articleId, $user_id, $title, $content, $image = null) {
        $slug = url_title($title, '-', true);

        //Préparation pour l'insertion dans la DB
        $this->db->set('author', $user_id)
                ->set('title', $title)
                ->set('content', $content)
                ->set('slug', $slug)
                ->set('image', $image)
                ->where('id', $articleId);
        return $this->db->update(self::TABLE);
    }

    /**
     * Supprime un article
     * @param int $id L'id de l'article.
     * @return bool Le résultat de la suppresion
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
            //si l'id n'est pas un entier
            if (!is_int($id)) {
                throw new InvalidArgumentException("L'id doit être un entier, " . gettype($id) . " donné");
            }
        }

        return $this->db->delete(self::TABLE, ['id' => $id]);
    }

}
