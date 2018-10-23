<?php

class BallotRest_Controller_test extends TestCase {

    public function test_castBallot() {
        $this->request("POST", ["vote/votepage"], [
            "ballot" => ["1"]
        ]);
    }
}

?>