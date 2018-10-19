<?php

class Auth extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper("url");

        $this->load->model("auth_model");

    }

    public function signIn(){
        $this->load->helper(array("form", "url"));
        $this->load->library("form_validation");

        $this->form_validation->set_rules($this->array_rules());

        if($this->form_validation->run() == FALSE) {
            $this->load->view("sign-in");
        } else {
            echo "success";
        }

    }

    public function studentNumber_check($no) {
        if($no == "") {
            $this->form_validation->set_message("studentNumber_check", "Please provide your username");
            return FALSE;
        }

        $numberExists = $this->auth_model->studentNumberExists($no);

        if($numberExists) {
            return TRUE;
        } else {
            $this->form_validation->set_message("studentNumber_check", "User does not exist");
            return FALSE;
        }
    }

    public function passwordValid_check($password) {
        $studentNumber = $this->input->post("username");
        return $this->auth_model->userAuthentic($studentNumber, $password);
    }

    private function array_rules() {
        return array(
            array(
                "field" => "username",
                "label" => "Username",
                "rules" => "required|callback_studentNumber_check"
            ),
            array(
                "field" => "password",
                "label" => "Password",
                "rules" => "required|min_length[8]|callback_passwordValid_check",
                "errors" => array(
                    "required" => "Please provide a password",
                    "passwordValid_check" => "Incorrect credentials"
                )
            )
        );
    }
}

?>