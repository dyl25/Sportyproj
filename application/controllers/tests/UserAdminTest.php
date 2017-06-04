<?php

/**
 * Description of UserTest
 *
 * @author admin
 */
class UserAdminTest extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('unit_test');
        $this->load->model('user_model');
        $this->load->model('athlete_model');
    }
    
    public function createAthleteSuccess() {
        $data['login'] = 'NouvelAthlete';
        $data['password'] = password_hash('nouveaupassword', PASSWORD_DEFAULT);
        $data['email'] = 'emailathlete@example.com';
        $id = $this->user_model->createUser($data);
        $dataDbAthlete['user_id'] = $id;
        $dataDbAthlete['club_id'] = 1;
        $dataDbAthlete['register_num'] = 36521;
        $dataDbAthlete['category_id'] = 2;
        
        $this->unit->run($this->athlete_model->create($dataDbAthlete), 'is_true', 'Test create athlete success');
        $this->load->view('tests/index');
    }
    
    public function createFail() {       
        $this->unit->run($this->user_model->create(), 'is_false', 'Test create athlete fail');
        $this->load->view('tests/index');
    }
    
    public function getUserIdSuccess() {
        $data['login'] = 'NouvelAthlete';
        $data['password'] = password_hash('nouveaupassword', PASSWORD_DEFAULT);
        $data['email'] = 'emailathlete@example.com';
        $this->unit->run($this->user_model->createUser($data), 'is_int', 'Test return of the user id');
        $this->load->view('tests/index');
    }
    
    public function isRoleUser() {
        $data['login'] = 'NouvelAthlete';
        $data['password'] = password_hash('nouveaupassword', PASSWORD_DEFAULT);
        $data['email'] = 'emailathlete@example.com';
        $id = $this->user_model->createUser($data);
        
        $this->unit->run($this->user_model->isRole($id, 'user'), 'is_true', 'Test return of the role of the user');
        $this->load->view('tests/index');
    }
    
    public function isNotRoleAdmin() {
        $data['login'] = 'NouvelAthlete';
        $data['password'] = password_hash('nouveaupassword', PASSWORD_DEFAULT);
        $data['email'] = 'emailathlete@example.com';
        $id = $this->user_model->createUser($data);
        
        $this->unit->run($this->user_model->isRole($id, 'admin'), 'is_false', 'Test return of the wrong role of the user');
        $this->load->view('tests/index');
    }

}
