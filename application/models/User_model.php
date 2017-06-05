<?php

/**
 * Model users, contient les méthodes d'accès et de manipulations de la table 
 * users
 *
 * @author admin
 */
class User_model extends MY_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    protected $table = 'users';

    /**
     * Vérifie que les données correspondent bien à un utilisateur existant.
     * @param string $email L'email de l'utilisateur.
     * @param string $password Le password de l'utilisateur.
     * @return boolean True si les données sont correctes sinon false.
     */
    public function checkUser($email, $password) {

        $this->db->select('password')
                ->where('email', $email);
        $query = $this->db->get($this->table);

        if (!($query->num_rows() == 1)) {
            return false;
        }

        //Récupère la ligne avec le mot de passe
        $dataPassword = $query->row('password');

        return password_verify($password, $dataPassword);
    }

    /**
     * Cree un utilisateur et retourne son id
     * @param array $params Le tableau de données
     * @return mixed L'id de l'utilisateur cree
     */
    public function createUser($params = array()) {
        if (empty($params)) {
            return false;
        }

        $this->db
                ->set($params)
                ->insert($this->table);

        return $this->db->insert_id();
    }

    /**
     * Vérifie si un utilisateur est un administrateur.
     * @param int $id L'id de l'utilisateur.
     * @return boolean True si l'utilisateur est un admin sinon false.
     */
    public function isAdmin($id) {
        $this->db->select('role_id')
                ->where('id', $id);

        $role_id = $this->db->get($this->table)->result_object()[0]->role_id;

        $this->db->select('name')
                ->where('roles.id', $role_id);

        $role = $this->db->get('roles')->result_object()[0]->name;
        return $role == 'admin';
    }
    
    /**
     * Determine si un utilisateur a le role demandé.
     * @param type $userId L'id de l'utilisateur.
     * @param type $roleName Le nom du role.
     * @return bool Un booleen selon que l'utilisateur possede le role ou non.
     */
    public function isRole($userId, $roleName) {
        $this->db->select('role_id')
                ->where('id', $userId);

        $role_id = $this->db->get($this->table)->result_object()[0]->role_id;

        $this->db->select('name')
                ->where('roles.id', $role_id);

        $role = $this->db->get('roles')->result_object()[0]->name;
        return $role == $roleName;
    }

    /**
     * Récupère l'id et le login d'un utilisateur grâce à son login.
     * @param string $email L'email de l'utilisateur.
     * @return int L'id de l'utilisateur
     */
    public function getUserData($email) {
        $this->db->select('users.id, login, roles.name as role')
                ->join('roles', 'roles.id = users.role_id')
                ->where('email', $email);

        $query = $this->db->get($this->table)->result_array();
        return $query[0];
    }

    public function getBy($option, $value) {

        $allowedOptions = ['id'];

        if (!in_array($option, $allowedOptions)) {
            throw new DomainException("L'option ne se trouve pas dans celles autorisées");
        }

        return $this->db->select('users.*, roles.name')
                        ->join('roles', 'roles.id = users.role_id')
                        ->get_where($this->table, [$this->table . '.' . $option => $value])
                        ->result_object()[0];
    }

    public function getUsers($sort = 'asc',$limit = null, $offset = null) {
        return $this->db->select('users.*, roles.name')
                        ->join('roles', 'roles.id = users.role_id')
                        ->order_by('users.id', $sort)
                        ->get($this->table, $limit, $offset)->result_object();
    }
    
    public function increaseToRole($userId, $roleName) {
        
    }

}
