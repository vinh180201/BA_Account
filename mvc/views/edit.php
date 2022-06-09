<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Edit</title>

    <style>    				                
        body{margin-top:20px;}
        .avatar{
        width:200px;
        height:200px;
        }
        .form-horizontal {
            width:400px;
            height: auto;
        }
        textarea {
            resize: none;
        }
        #msg {
          background-color: yellow;
          display: inline-block;
        }
    </style>    
</head>
<body>
    <div id="header"></div>
        <?php require_once('pages/header.php'); ?>
    <div id="content"></div>
        <?php require_once('pages/navbar.php'); ?>

<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">Edit Profile</h1>
      <hr>
	<div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          <img src="../public/image/default_icon.jpg" class="avatar img-circle img-thumbnail" alt="avatar">
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
      <?php 
				if (isset($data["msg"])) {
					echo "<h5 id='msg'>" . $data["msg"] . "</h5>"; 
				}
			?>
        <h3>Profile</h3>
        <form class="form-horizontal" role="form" method="POST" action="submit_edit">
          <div class="form-group">
            <label class="col-lg-3 control-label">Name:</label>
            <div class="col-lg-8">
              <input name="hoten" class="form-control" type="text" value="<?php if(isset($_SESSION["hoten"])) { echo $_SESSION["hoten"]; } ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input name="email" class="form-control" type="text" value="<?php if(isset($_SESSION["email"])) { echo $_SESSION["email"]; } ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Phone:</label>
            <div class="col-lg-8">
              <input name="sdt" class="form-control" type="text" value="<?php if(isset($_SESSION["sdt"])) { echo $_SESSION["sdt"]; } ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Birth:</label>
            <div class="col-lg-8">
              <input name="ngaysinh" class="form-control" type="date" value="<?php if(isset($_SESSION["ngaysinh"])) { echo $_SESSION["ngaysinh"]; } ?>">
            </div>
          </div>  
            <div class="form-group">
            <label class="col-lg-3 control-label">About me:</label>
            <div class="col-lg-8">
              <textarea name="about_me" class="form-control" rows = "5" type="text" ><?php if(isset($_SESSION["about_me"])) { echo $_SESSION["about_me"]; } ?></textarea>
            </div>
          </div>
            <div class="col-lg-8">
                <button type="submit" name="submit_login" class="btn btn-primary">Save</button>
            </div>
          </div>
          <div class="col-lg-8">
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
<hr>

<div id="footer"></div>
        <?php require_once('pages/footer.php'); ?>
</body>
</html>