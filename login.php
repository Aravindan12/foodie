<?php 
session_start();

$name = "";
$password = "";

$errors = array();

//connect to db
$db = mysqli_connect('localhost','root','','foodie');

//log user in from login page
    if(isset($_POST['login'])) {
        $name = $_POST['name'];
        $password = $_POST['password'];
    
    if(empty($name)) {
        array_push($errors,"username is required");
    }
    if(empty($password)){
        array_push($errors,"password is required");
    }
    if(count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE name='$name' AND password = '$password' ";
        $result = mysqli_query($db,$query);
        if (mysqli_num_rows($result) == 1){
            $row = $result->fetch_assoc();
            $verified = $row['verified'];

            if($verified == 1){
                $_SESSION['name'] = $name;
            $_SESSION['success'] = "you are logged in";
            header('location: index.php');//redrict to home pag
            } else {
            echo "please verify your account";
            }
        }else{
            array_push($errors,"wrong username/password combination");
        }
    }
}
    //logout 
    
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
		<h3>Login</h3>
					
					<form action = "login.php"  method="POST">
                    <?php include('errors.php'); ?>

                        <div class="mb-3">
                            <label for="Name1" class="form-label">Name</label>
                            <input type="text" class="form-control" id="Name1" name="name">
                          </div>
                            
                        <div class="mb-3">
                            <label for="Password1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="Password1" name="password">
                        </div>
                            
						<input type="submit" class="btn btn-primary" id="butt" name="login" value = "Login">
                        <p> Not Already a user?<a href="register.php">Register</a></p>
                        <p>Forgot password?<a href="forgot.php" name="forgot">click me!</a></p>
					</form>
				</div>
		</div>
	</div>
</body>
</html>