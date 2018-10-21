<?php
class CandididateDetails_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper("url");
    }

    public function candidates() {
        $this->load->database();

        $query = $this->db->get("candidates");
        return json_encode($query->result_array());
    }

}

?>