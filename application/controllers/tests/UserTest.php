<?php

/**
 * Description of UserTest
 *
 * @author admin
 */
class UserTest extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('unit_test');
        $this->load->model('user_model');
    }

    public function signupSuccess() {

        $data['login'] = 'JeanMarc';
        $data['password'] = password_hash('aklp58Mf', PASSWORD_DEFAULT);
        $data['email'] = 'monemail@example.com';
        $this->unit->run($this->user_model->create($data), 'is_true', 'Test signup success');
        $this->load->view('tests/index');
    }
    
    public function loginSuccess() {
        $email = 'marc@marc.com';
        $password = 'marc';
        
        $this->unit->run($this->user_model->checkUser($email, $password), 'is_true', 'Test login success');
        $this->load->view('tests/index');
    }
    
    public function loginFail() {
        $email = '';
        $password = 'marc';
        
        $this->unit->run($this->user_model->checkUser($email, $password), 'is_false', 'Test login fail');
        $this->load->view('tests/index');
    }
    
    public function loginFail2() {
        $email = '';
        $password = '';
        
        $this->unit->run($this->user_model->checkUser($email, $password), 'is_false', 'Test login fail');
        $this->load->view('tests/index');
    }

}
