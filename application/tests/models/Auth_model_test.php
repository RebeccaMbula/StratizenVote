<?php

class Auth_model_test extends TestCase{

    public function setUp()
	{
		$this->resetInstance();
        $this->CI->load->model('auth_model');
        $this->obj = $this->CI->auth_model;
        // $this->$CI->load->library("Student");
    }
    
    public function test_studentNumberExists() {
        $exists = $this->obj->studentNumberExists(100000);
        $this->assertTrue($exists);

        $notExists = $this->obj->studentNumberExists(123456);
        $this->assertFalse($notExists);
    }

    public function test_userAuthentic() {
        $noneExistent = $this->obj->userAuthentic(111, "asdf", FALSE);
        $this->assertEquals($noneExistent, "No student");

        $existsWithWrongPassword = $this->obj->userAuthentic(100000, "asdf");
        $this->assertFalse($existsWithWrongPassword);

        $existsWithCorrectPassword = $this->obj->userAuthentic(100000, "giradifatha");
        $this->assertTrue($existsWithCorrectPassword);
    }

    public function test_hasVoted() {
        //100000 has voted
        $this->assertTrue($this->obj->hasVoted(100000));
        //101366 has not voted
        $this->assertFalse($this->obj->hasVoted(101366));
        //100111 does not exist
        $this->assertEquals($this->obj->hasVoted(100111), "Error. Student number not exist");
    }

}
?>