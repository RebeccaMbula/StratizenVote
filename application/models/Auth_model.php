<?php

// To handle authentication and authorization
class Auth_model extends CI_Model {

    public function __construct() {
        $this->load->database();
        $this->load->library('Student');
    }

    //***
    public function studentNumberExists($studentNumber) {
        return $this->getStudent($studentNumber) ? TRUE : FALSE;
    }

    //***
    public function userAuthentic($studentNumber, $password, $hashed=FALSE) {
        return $this->checkCredentials($studentNumber, $password, $hashed);
    }

    //IS THIS METHOD NECESSARY
    private function checkCredentials($studentNumber, $password, $hashed) {
        $student = $this->getStudent($studentNumber);

        if(!$student) return "No student";

        $valid = $hashed ? 
            password_verify($password, $student->password) :
            $password === $student->password;

        if($valid) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    private function getStudent($studentNumber) {
        $this->db->where("student_no", $studentNumber);
        $query = $this->db->get("students");

        return $query->custom_row_object(0, "Student");
    }

}

?>