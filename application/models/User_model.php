<?php

/**
 * Model users, contient les méthodes d'accès et de manipulations de la table 
 * users
 *
 * @author admin
 */
class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    const TABLE = 'users';

    /**
     * Vérifie si un login existe déjà.
     * @param string $login Le login à vérifier.
     * @return boolean True si le login existe déjà sinon false.
     */
    private function loginExist($login) {

        $this->db->where('login', $login);

        $query = $this->db->get(self::TABLE);

        return $query->num_rows() == 1;
    }

    /**
     * Vérifie si un email existe déjà.
     * @param string $email L'email à vérifier.
     * @return boolean True si l'email existe déjà snino false.
     */
    private function emailExist($email) {

        $this->db->where('email', $email);

        $query = $this->db->get(self::TABLE);

        return $query->num_rows() == 1;
    }

    /**
     * Créé un utilisateur avec un login, un role, un mot de passse et un email
     * @param string $login Le login de l'utilisateur.
     * @param string $password Le mot de passe de l'utilisateur.
     * @param string $email L'email de l'utilisateur.
     * @return boolean True si l'utilisateur a bien été insséré sinon false.
     */
    public function createUser($login, $role, $password, $email, $profilePicture = null) {

        $password = password_hash($password, PASSWORD_DEFAULT);

        //Préparation des données pour l'insertion dans la DB
        $this->db->set('login', $login);
        $this->db->set('role_id', $role);
        $this->db->set('password', $password);
        $this->db->set('email', $email);
        $this->db->set('profile_image', $profilePicture);

        return $this->db->insert(self::TABLE);
    }

    /**
     * Vérifie que les données correspondent bien à un utilisateur existant.
     * @param string $email L'email de l'utilisateur.
     * @param string $password Le password de l'utilisateur.
     * @return boolean True si les données sont correctes sinon false.
     */
    public function checkUser($email, $password) {

        $this->db->select('password')
                ->where('email', $email);
        $query = $this->db->get(self::TABLE);

        if (!($query->num_rows() == 1)) {
            return false;
        }

        //Récupère la ligne avec le mot de passe
        $dataPassword = $query->row('password');

        return password_verify($password, $dataPassword);
    }

    /**
     * Vérifie si un utilisateur est un administrateur.
     * @param int $id L'id de l'utilisateur.
     * @return boolean True si l'utilisateur est un admin sinon false.
     */
    public function isAdmin($id) {
        $this->db->select('role_id')
                ->where('id', $id);

        $role_id = $this->db->get(self::TABLE)->result_object()[0]->role_id;

        $this->db->select('name')
                ->where('roles.id', $role_id);

        $role = $this->db->get('roles')->result_object()[0]->name;
        return $role == 'admin';
    }

    /**
     * Récupère l'id d'un utilisateur grâce à son login.
     * @param string $email L'email de l'utilisateur.
     * @return int L'id de l'utilisateur
     */
    public function getUserData($email) {
        $this->db->select('id, login')
                ->where('email', $email);

        $query = $this->db->get(self::TABLE)->result_array();
        return $query[0];
    }

    public function getBy($option, $value) {

        $allowedOptions = ['id'];

        if (!in_array($option, $allowedOptions)) {
            throw new DomainException("L'option ne se trouve pas dans celles autorisées");
        }

        return $this->db->select('users.*, roles.name')
                        ->join('roles', 'roles.id = users.role_id')
                        ->get_where(self::TABLE, [self::TABLE . '.' . $option => $value])
                        ->result_object()[0];
    }

    public function getUsers($limit = null) {
        return $this->db->select('users.*, roles.name')
                        ->join('roles', 'roles.id = users.role_id')
                        ->order_by('users.id', 'ASC')
                        ->get(self::TABLE, $limit)->result_object();
    }

    public function updateUser($userId, $login, $role, $password, $email, $profilePicture = null) {
        $this->db->set('login', $login)
                ->set('role_id', $role)
                ->set('password', $password)
                ->set('email', $email)
                ->set('profile_image', $profilePicture)
                ->where('id', $userId);
        return $this->db->update(self::TABLE);
    }

}
