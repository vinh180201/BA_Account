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
    <link rel="stylesheet" href="../public/scss/profile_card.scss">
    <title>Home</title>

</head>
<body>
    <div id="header"></div>
        <?php require_once('pages/header.php'); ?>
    <div id="content"></div>
        <?php require_once('pages/navbar.php'); ?>
        <?php include_once('pages/navbar.php'); ?>

<div class="profile">
    <div class="headerbox">
        <div>
            <img src="../public/image/default_icon.jpg" alt="icon" />
        </div>
        <div class="info">
            <h1> <?php echo $data["hoten"] ?>
            <small><?php echo $data["about_me"] ?></small></h1>
        </div>
    </div>
    <?php 
        $date = date('d-m-Y', strtotime($data["ngaysinh"])); 
    ?>
    <main>
        <dl>
            <dt>Date of birth</dt>
            <dd><?php echo $date ?></dd>
            <dt>Email</dt>
            <dd><?php echo $data["email"] ?></dd>
            <dt>Phone number</dt>
            <dd><?php echo $data["sdt"] ?></dd>
            <dd>
            <a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a> 
            <a href="#"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
            </dd>
        </dl>
    </main>
</div> <!-- end profile -->



    <div id="footer"></div>
        <?php require_once('pages/footer.php'); ?>
</body>
</html>