<?php
session_start();
//get values
if (isset($_POST['username']) && isset($_POST['password'])) {
$user=$_POST['username'];
$password=$_POST['password'];

//prevent mysql injection
$mysqli = new mysqli("localhost", "root", "", "onlinevote");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 
$user = $mysqli->real_escape_string($_POST['username']);
$password = $mysqli->real_escape_string($_POST['password']);

//connect to database
//mysqli_connect("localhost","root","");
//mysql_select_db("onlinevote");

//Query datbase for user
$result=$mysqli->query("select *from account where username ='$user' and password ='$password'") or die("failed to query database" .mysqli_error());
$row=mysqli_fetch_array($result);
if($row['username']==$user && $row['password'] ==$password){
	echo "Login successful";
	$_SESSION['username']=$row['username'];
	/*$_SESSION['email']=$row['email'];*/
	$_SESSION['password']=$row['password'];
/*header("location: Home.html");*/
echo "<script type='text/javascript'>alert('Login successful');</script>";
}
else{
//echo "<script type='text/javascript'> alert("Login unsuccessful");</script>";
//header("location: login.html");
header( "refresh:0.5; url=index.html" );
$message = "Invalid username or password";
echo "<script type='text/javascript'>alert('$message');</script>";

}}