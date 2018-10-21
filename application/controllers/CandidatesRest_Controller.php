<?php

require(APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;

class CandidatesRest_Controller extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("candidates_model");
    }

    public function candidatesByPost_get() {
        $candidates = $this->candidates_model->getCandidatesByPost();
        $this->response($candidates);
    }

    public function candidatesAndPosts_get() {
        $candidates = $this->candidates_model->getAllCandidates();
        $posts = array_values($this->candidates_model->getPosts());

        $result = array(
            "candidates" => $candidates,
            "posts" => $posts
        );

        $this->response($result);
    }

    public function candidates_get() {
        $result = $this->candidates_model->getAllCandidates();
        $this->response($result);
    }

    public function posts_get() {
        $result = $this->candidates_model->getPosts();
        $this->response($result);
    }
}

?>