<?php

session_start();

$name = "";
$email = "";

$errors = array();

//connect to db
$db = mysqli_connect('localhost','root','','foodie');
//if register button is clicked
if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];
    
    

//check whether those fields are filled
if(empty($name)){
    array_push($errors,'name is required');
}
if(empty($email)){
    array_push($errors,'email is required');
}
if(empty($password)){
    array_push($errors,'password is required');
}

if($password != $c_password){
    array_push($errors,'password not match');
}

//if no error insert the field into database
if(count($errors)==0){
    $vkey = md5(time().$name);
    $password = md5($password);
    $sql = "INSERT INTO users(name,email,password,vkey) VALUES('$name','$email','$password','$vkey')";
    mysqli_query($db,$sql);
  
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($db,$query);
    
        

        
    if($sql){
        //send email
        $to = $email;
        $subject = "mail verify";
        $message = "<a href = 'http://localhost/foodie/try.php?vkey=$vkey'>verify</a>";
        $headers = "From: fortheotherpurpose04@gmail.com "."\r\n";
        $headers .="MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        mail($to,$subject,$message,$headers);
        header('location:mail.php');
    }else{
        echo "error";
    }

    
    $_SESSION['name'] = $name;
    $_SESSION['success'] = "you are logged in";
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
			<li class="nav-item"><a class="nav-link" href="login.html"> sign-in</a></li>
			
		</ul>
	</div>
</div>
</nav>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
		<h3>Register</h3>
					
		<form action="register.php" method="POST">
            <?php include('errors.php'); ?>
			<div class="mb-3">
				<label for="Name1" class="form-label">Name</label>
				<input type="text" class="form-control" id="Name1" name="name">
			  </div>
			<div class="mb-3">
			  <label for="Email1" class="form-label">Email address</label>
			  <input type="email" class="form-control" id="Email1" name="email">
			</div>
			<div class="mb-3">
			  <label for="Password1" class="form-label">Password</label>
			  <input type="password" class="form-control" id="Password1" name="password">
			</div>
			<div class="mb-3">
			   <label for="Password2" class="form-label">Confirm Password</label>
			   <input type="password" class="form-control" id="Password2" name="c_password">
			</div>
			<input type="submit" class="btn btn-primary" name = "register" value = "Register">
		  </form>
		  <p>Already a user?<a href="login.php">login</a></p>

		</div>
		</div>
	</div>
</body>
</html>