<?php

class Auth extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper("url");
        // $this->load->helper("utility_helper");
    }

    public function signIn(){
        $this->load->view("sign-in");
    }
}

?>