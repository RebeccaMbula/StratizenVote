<?php

class Ballot_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function addVote($voterStudentNumber, $candidateId) {
        $this->db->set("votes", "votes+1", FALSE);
        $this->db->where("id", $candidateId);
        $this->db->update("candidates");

        $this->db->set("voted", "true", FALSE);
        $this->db->where("student_no", $voterStudentNumber);
        $this->db->update("students");
    }

}

?>