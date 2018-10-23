<?php
//setting header to json
header('Content-Type: application/json');

//database
$mysqli = new mysqli("localhost", "root", "", "poll");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 
//query to get data from the table
$query = sprintf("SELECT candidate_name, candidate_cvotes FROM tbcandidates ORDER BY candidate_cvotes");

//execute query
$result = $mysqli->query($query);

//loop through the returned data
$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

//free memory associated with result
$result->close();

//close connection
$mysqli->close();

//now print the data
print json_encode($data);