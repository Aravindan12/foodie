<?php

$password1 = "";
$password2 = "";

$errors = array();

$db = mysqli_connect('localhost','root','','foodie');

//if valid button is clicked
if(isset($_POST['valid'])){
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

    if(empty($password1)){
        array_push($errors,"password is required");
    }
    if(empty($password2)){
        array_push($errors,"confirm your password");
    }
    if($password1 != $password2){
        array_push($errors,"password not match");
    }
    if(count($errors) == 0) {
        $password1 = md5($password1);
    $result = mysqli_query($db,"SELECT * FROM users");
    while($row = mysqli_fetch_array($result)){
        $id = $row['id'];
    }
    $update = "UPDATE users SET password = '$password1' WHERE id = '$id'";
    $result1 = mysqli_query($db,$update);
    
    if($result1){
        echo "your password is updated. you can login now";
        header('location:login.php');

    }else{
        echo "invalid email-id";
    }
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
		<h3>Confirm Password</h3>
					
					<form action = "confirm.php"  method="POST">
                    <?php include('errors.php'); ?>

                        <div class="mb-3">
                            <label for="Password1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="Password1" name ="password1">
                          </div>
                          <div class="mb-3">
                             <label for="Password2" class="form-label">Confirm Password</label>
                             <input type="password" class="form-control" id="Password2" name = "password2">
                          </div>
                            
							<button type="submit" class="btn btn-primary mb-2" id="butt" name="valid">Confirm</button>
                            <p> Not Already a user?<a href="register.php">Register</a></p>
                            
					</form>
				</div>
		</div>
	</div>
</body>
</html>