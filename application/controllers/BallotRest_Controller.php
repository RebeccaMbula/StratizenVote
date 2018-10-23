<?php

require(APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;

class BallotRest_Controller extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("ballot_model");
        $this->load->model("auth_model");
    }

    public function castBallot_post() {
        $voterStudentNumber = $this->post("studentNumber");
        $candidateIds = $this->post("ballot");

        foreach($candidateIds as $candidateId){
            $hasVoted = $this->auth_model->hasVoted($voterStudentNumber);
            if(!$hasVoted){
                $this->ballot_model->addVote($voterStudentNumber, $candidateId);
                $this->response("votedone");
            } else {
                $this->response("twovote");
            }
        }
    }

}

?>