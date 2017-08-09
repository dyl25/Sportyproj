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
     * Extension de is_unique pour permettre aux methodes edit de faire un 
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
    
    /**
     * Vérifie qu'une date est bien au format yyyy-m-dd.
     * @param string $date La date à vérifier
     * @return boolean Si la date est dans l'interval de temps ou non.
     */
    public function check_date($date) {
        $dateTable = explode("-", $date);

        //on vérifie que la date est bien divisé en 3
        if (sizeof($dateTable) != 3) {
            $this->set_message('check_date', 'La %s n\'est pas valide, elle doit correspondre au format aaaa/mm/jj');
            return false;
        }

        list($year, $month, $day) = explode("-", $date);
        
        if (!is_numeric($day) || !is_numeric($month) || !is_numeric($year)) {
            $this->set_message('check_date', 'La %s n\'est pas valide, elle doit correspondre au format aaaa/mm/jj');
            return false;
        }
        //on vérifie que la date existe bien
        if (!checkdate($month, $day, $year)) {
            $this->set_message('check_date', 'La %s n\'est pas valide, elle doit correspondre au format aaaa/mm/jj');
            return false;
        }
        $userDate = new DateTime($date);
        $userDate = $userDate->format('Y-m-d');
        
        $now = new DateTime();
        $now = $now->format('Y-m-d');
        //un event ne peut pas avoir plus qu'1 an
        $expires = new DateTime('+1 year');
        $expires = $expires->format('Y-m-d');

        if ($userDate >= $now && $userDate <= $expires) {
            return true;
        } else {
            $this->set_message('check_date', 'La %s n\'est pas valide, un événement ne peut être au-delà de 1 an ou une date ultérieur à aujourd\'hui.');
            return false;
        }
    }

}
