<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<style type="text/css">
  	.btn-primary {
		margin-right: 50px;
		margin-top: 10px;
	}
	.top-buffer { margin-top: 90px;}
	body{
  		background-color: skyblue;
  	}
	#msg {
		background-color: yellow;
		display: inline-block;
	}
	
  	</style>
	<base href="http://localhost/BA_account/">
</head>
<body>

<div class="container">

<div class="row top top-buffer">
	<div class="col-md-4"></div>
	<div class="col-md-4">

		<div class="jumbotron">
			<h4>Login</h4>	
		<form method="POST" action="Home/login">
			<?php
			if (isset($data["result"])) {
				if ($data["result"] == true) {

				}
				else {
					echo "<h5 id='msg'>" . "Đăng nhập thất bại" . "</h5>";
				}
			}
			?>
			<div class="form-group">
				<label>Username:</label>
				<input type="username" name="username" class="form-control"  value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>" >
			</div>
			<div class="form-group">
				<label>Password:</label>
				<input type="password" name="password" class="form-control" >
			</div>
			<div class="form-group">
			<label for="login-remember"><input type="checkbox" id="remember" name="remember">Remember Me</label>
			
		</div>
		<a href="http://localhost/BA_account/login/forgot_password" > Forgot password?</a>
		</br>
		<button type="submit" name="submit_login" class="btn btn-primary">Login</button>

		<button type="submit" class="btn btn-primary" formaction="Login/Signup">Sign up</button>
		
			
		</form>
	</div>
	</div>
	<div class="col-md-4"></div>
</div>

<?php 
	if (isset($data["alert"])) {
		if ($data["alert"] == "sign_up_success") {
			echo "<script>alert('Sign up success');</script>"; 
		}
	}

?>
</body>