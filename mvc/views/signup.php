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
		margin-right: 0px;
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
			<h4>Sign Up</h4>
			<?php 
				if (isset($data["msg"])) {
					echo "<h5 id='msg'>" . $data["msg"] . "</h5>"; 
				}
			?>		
		<form method="POST" action="Login/Signup">
			<div class="form-group">
				<label>Your Name:</label>
				<input type="text" name="hoten" class="form-control"  required>
			</div>
			<div class="form-group">
				<label>Your Username:</label>
				<input type="username" name="username" class="form-control" required>
			</div>
			<div class="form-group">
				<label>Your Password:</label>
				<input type="password" name="password" class="form-control" required>
			</div>

			<div class="form-group">
				<label>Your Email:</label>
				<input type="email" name="email" class="form-control" required>
			</div>
			<div class="form-group">
				<label>Your Phone:</label>
				<input type="text" name="sdt" class="form-control" required>
			</div>
			<div class="form-group">
				<label>Your Birth:</label>
				<input type="date" name="ngaysinh" class="form-control" required>
			</div>


		<button type="submit" name="submit_signup" class="btn btn-primary" ">Sign up</button>
			
		</form>
	</div>
	</div>
	<div class="col-md-4"></div>
</div>

</body>