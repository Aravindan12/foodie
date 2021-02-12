<?php
$email = "";

$errors = array();
//connect to db
$db = mysqli_connect('localhost','root','','foodie');
//if submit is clicked
if(isset($_POST['check'])){
    $email = $_POST['email'];
    if(empty($email)){
        array_push($errors,"email is required");
    }
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($db,$query);
    if(mysqli_num_rows($result) == 1){
        $to = $email;
        $subject = "mail verify";
        $message = "<a href = 'http://localhost/foodie/confirm.php'>verify</a>";
        $headers = "From: fortheotherpurpose04@gmail.com "."\r\n";
        $headers .="MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        mail($to,$subject,$message,$headers);
        header('location:mail.php');
    } 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Complete Bootstrap 4 Website Layout</title>
	<link rel="stylesheet" href="./css/bootstrap.min.css">
	<script src="./js/jquery.min.js"></script>
	<script src="./js/popper.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/all.js"></script>
	<link href="style.css" rel="stylesheet">

</head>
<body data-spy="scroll" data-target="#navbarResponsive">

<!-- Navigation -->
<nav class="navbar navbar-expand-md navbar-light bg-light fixed-top" >
<div class="container-fluid">
	<a class="navbar-brand" href="#"><img src="./img/logo.png"></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarResponsive">
		<ul class="navbar-nav ml-auto">
			<li class="nav-item"><a class="nav-link" href="register.html"> sign-up</a></li>
			
		</ul>
	</div>
</div>
</nav>
<div class="container padding">
	<div class="row padding">
		<div class="col-sm-12">
		<h3>Forgot Password</h3>
					
					<form action = "forgot.php"  method="POST">
                    <?php include('errors.php'); ?>

						<div class="mb-3">
                            <label for="Email1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="Email1" name="email">
                        </div>
						<button type="submit" class="btn btn-primary mb-2" id="butt" name="check">Check</button>
                        <p> Not Already a user?<a href="register.php">Register</a></p>
                            
					</form>
				</div>
		</div>
	</div>
</body>
</html>