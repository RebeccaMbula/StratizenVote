<?php

class Vote_Controller extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper("url");
        $this->load->library("session");
    }

    public function votePage(){
        $data["pageLabel"] = "vote";
        $data["title"] = "StratizenVote";

        $this->load->view("templates/header", $data);
        $this->load->view("Vote");
    }
}

?>