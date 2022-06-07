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
			<h4>Forgot password</h4>	
		<form method="POST" action="login/<?php echo $data["action"] ?>">
			<?php
			if (isset($data["msg"])) {
				echo "<h5 id='msg'>" . $data["msg"] . "</h5>"; 
			}
			?>
			<?php
				// if (isset($data["verify_user"])) {
					if ($data["verify_user"] == false) {
						echo "<div class='form-group'>
						<label>Your username:</label>
						<input type='username' name='username' class='form-control' required >
						</div>";
					}
				// }
				
				
			?>
			<!-- <div class='form-group'>
				<label>Your username:</label>
				<input type='username' name='username' class='form-control' required >
			</div> -->
			<?php
				// if (isset($data["verify_user"])) {
					if ($data["verify_user"] == true && $data["verify_data"] == false) {
						echo "<div class=\"form-group\">
							<label>Your email:</label>
							<input type=\"email\" name=\"email\" class=\"form-control\" required>
							</div>
							<div class=\"form-group\">
								<label>Your phone number:</label>
								<input type=\"text\" name=\"sdt\" class=\"form-control\" required>
							</div>";
					}
				// }	
			?>

			<?php
				// if (isset($data["verify_user"])) {
					if ($data["verify_user"] == true && $data["verify_data"] == true) {
						echo "Here is your password. Don't share to anyone.</br></br>";
						if (isset($data["password"])) {
							echo "Password:" . $data["password"];
						}
						else {
							"Something wrong here. We can't get your password.";
						}
						echo "</br> </br>";
					}
				// }
			?>
		<?php
			if ($data["verify_user"] == true && $data["verify_data"] == true) {
				echo "<button type='submit' name='submit_forgot_password' formaction='login' class='btn btn-primary'>OK</button>";
			}
			else {
				echo "<button type='submit' name='submit_forgot_password' class='btn btn-primary'>Next</button>";
			}	
		?>	
		<!-- <button type='submit' name='submit_forgot_password' class='btn btn-primary'>Next</button> -->
			
		</form>
	</div>
	</div>
	<div class="col-md-4"></div>
</div>

</body>