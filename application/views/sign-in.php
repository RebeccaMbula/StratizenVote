﻿<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Transparent Login Form</title>
		<link rel="stylesheet" href="<?php echo resource_url("css/sign-in/style.css") ?>">
	</head>
	<body>
		<div class="loginBox">
			<img src="<?php echo resource_url("media/images/sign-in/user.png"); ?>" class="user">
			<h2>Log In Here</h2>
			<form action="index.php" method="post">
				<p>Username</p>
				<input type="text" name="username" placeholder="Enter your admission number">
				<p>Password</p>
				<input type="password" name="password" placeholder="••••••">
				<input type="submit" name="" value="Sign In">
                                
				<a href="#">Forgot Password</a><br>
                                <input type="checkbox" id="a">
                                <label for="a">Remember me</label>

			</form>
		</div>
	</body>
</html>
