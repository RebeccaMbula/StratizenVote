<?php

class Candidates_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getCandidatesByPost(){
        $candidates = $this->getAllCandidates();

        $candidatesByPost = [];
        foreach($candidates as $c){
            $candidatesByPost[$c["position"]][] = $c;
        }
        return $candidatesByPost;
    }

    public function getAllCandidates() {
        $query = $this->db->get("candidates");
        return $query->result_array();
    }

    public function getPosts() {
        $this->db->select("position");
        $this->db->distinct();
        $query = $this->db->get("candidates");

        $posts = [];
        foreach($query->result_array() as $row) {
            $posts[] = $row["position"];
        }

        return $posts;
    }
}

?>