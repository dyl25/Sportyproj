<?php

/**
 * Description of UserTest
 *
 * @author admin
 */
class LocaliteModelTest extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('unit_test');
        $this->load->model('localite_model');
    }

    public function getArraySuccess() {
        $this->unit->run($this->localite_model->getLocalites(), 'is_array', 'Test give array');
        $this->load->view('tests/index');
    }

}
