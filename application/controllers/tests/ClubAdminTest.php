<?php

/**
 * Test des methodes du controller Club_admin
 *
 * @author admin
 */
class ClubAdminTest extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('unit_test');
        $this->load->model('club_model');
    }

    public function createClubSuccess() {
        $data['localite_id'] = 1;
        $data['shortname'] = 'sh';
        $data['name'] = 'clubName';
        $data['address'] = 'clubAddress';

        $this->unit->run($this->club_model->create($data), 'is_true', 'Test create club success');
        $this->load->view('tests/index');
    }

    public function createFail() {
        $this->unit->run($this->club_model->create(), 'is_false', 'Test create club fail');
        $this->load->view('tests/index');
    }

}
