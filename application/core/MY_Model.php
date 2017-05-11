<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of MY_Model
 *
 * @author admin
 */
class MY_Model extends CI_Model {

    public function create($params = array()) {
        if (empty($params)) {
            return false;
        }

        return (bool) $this->db
                        ->set($params)
                        ->insert($this->table);
    }
    
    public function update($where, $params = array()) {
        
        if (empty($params)) {
            return false;
        }

        return (bool) $this->db
                        ->set($params)
                        ->where($where)
                        ->update($this->table);
    }

    public function delete($where) {
        return (bool) $this->db
                        ->where($where)
                        ->delete($this->table);
    }

}
