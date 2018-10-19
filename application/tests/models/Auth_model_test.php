<?php

class Auth_model_test extends TestCase{

    public function setUp()
	{
		$this->resetInstance();
		$this->CI->load->model('auth_model');
		$this->obj = $this->CI->auth_model;
    }
    
    public function test_StudentNumberExists() {
        $exists = $this->obj->studentNumberExists(100000);
        $this->assertTrue($exists);
    }

}
?>