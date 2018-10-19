<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Transparent Login Form</title>
		<link rel="stylesheet" href="<?php echo resource_url("dependencies/bootstrap.min.css") ?>">
		<link rel="stylesheet" href="<?php echo resource_url("css/sign-in/style.css") ?>">
	</head>
	<body>
		<div class="loginBox">
			<img src="<?php echo resource_url("media/images/sign-in/user.png"); ?>" class="user">
			<h2>Log In Here</h2>
			<?php echo form_open("auth/signIn"); ?>
				<div class="error-message">
					<?php echo form_error("username"); ?>
				</div>
				<p class="field-label">Username</p>
				<input type="text" name="username" value="<?php echo set_value("username"); ?>" placeholder="Enter your admission number">

				<div class="error-message">
					<?php echo form_error("password"); ?>
				</div>
				<p class="field-label">Password</p>
				<input type="password" name="password" placeholder="••••••">
				<div class="form-group">
					<label for="languageSelect">Choose preferred language</label>
					<select id="languageSelect" name="language">
						<option value="english">English</option>
						<option value="kiswahili">Kiswahili</option>
					</select>
				</div>

				<input type="submit" name="" value="Sign In">

                                
				<a href="#">Forgot Password</a><br>
                                <input type="checkbox" id="a">
                                <label for="a">Remember me</label>

			</form>
		</div>
	</body>
</html>
