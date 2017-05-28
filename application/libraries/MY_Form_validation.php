<?php

/**
 * Description of MY_Form_validation
 *
 * @author admin
 */
class MY_Form_validation extends CI_Form_validation {

    protected $CI;

    public function __construct($config = array()) {
        parent::__construct($config);
        // Assign the CodeIgniter super-object
        $this->CI = & get_instance();
    }

    /**
     * Extension de is_unique pour permettre aus methodes edit de faire un 
     * même si une ancienne valeur est présente
     * @param type $str
     * @param type $field
     * @return boolean
     * @author Dylan Vansteenacker
     */
    public function is_unique_update($str, $field) {

        list($table, $field, $field_key, $current_key) = explode(".", $field);

        if (isset($this->CI->db)) {
            if ($this->CI->db->limit(1)->get_where($table, array($field => $str, $field_key => $current_key))->num_rows() === 0 
                    && $this->CI->db->limit(1)->where('id !=', $current_key)->get_where($table, array($field => $str))->num_rows() === 1) {
                $this->CI->form_validation->set_message('is_unique_update', 'Le champ {field} doit contenir une valeur unique.');
                return false;
            }
            return true;
        } else {
            return false;
        }
    }

}
