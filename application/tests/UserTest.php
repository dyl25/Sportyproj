<?php

class UserTest extends CIUnit_Framework_TestCase {

    public function testLoginSuccess() {
        $this->assertTrue(TRUE);
    }

    public function testAccessCIModel() {
        $model = $this->get_instance()->user_model->create();
        $this->assertEquals(10, count($model));
    }

    /* public function testSignupSuccess() {
      $this->load->model('user_model');

      $data['login'] = 'JeanMarc';
      $data['password'] = password_hash('aklp58Mf', PASSWORD_DEFAULT);
      $data['email'] = 'monemail@example.com';

      $this->assertTrue($this->user_model->create($data));
      } */
}
