<?php

/**
 * Description of Comment_model
 *
 * @author admin
 */
class Category_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    const TABLE = 'category';

    public function getCategories() {

        return $this->db->get(self::TABLE)
                        ->result_object();
    }

}
