<?php
session_start();
$db = mysqli_connect('localhost','root','','foodie');


if(isset($_POST["submit"])){
    if(!empty($_POST["checkbox"])){
        //echo "<h3>Your are selected food for</h3>";
        $string_version = implode(' ',$_POST['checkbox']);
        $_SESSION['string'] = $string_version;
      $count = count( $_POST['checkbox'] );
      $price = $count*40;
      $add = $db->query("UPDATE users SET today_amount = '$price'");
    }else{
        echo "please select one";
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
</head>
<body>

<!-- Navigation -->


<!--- Three Column Section -->
<form action = "index.php" method = "POST">
			
			<p><input type="checkbox" name = 'checkbox[]' value = "breakfast">breakfast</p>
	
			<p><input type="checkbox" name = 'checkbox[]' value = "lunch">lunch</p>

            <p><input type="checkbox" name = 'checkbox[]' value = "dinner">dinner</p>
			<input type="hidden" name="proceed" value="proceed">
		<input type="submit" name ="submit" value = "submit">
</form>

<?php 
$db = mysqli_connect('localhost','root','','foodie');


$display = $db->query("SELECT * FROM users");
while($row=mysqli_fetch_array($display)){
    $id = $row['id'];
    
}
$display1 = $db->query("SELECT * FROM users WHERE id='$id'");
while($row=mysqli_fetch_array($display1)){
    echo "<p>your todays amount is ".$row['today_amount']."</p>";
    echo "<a href='index.php?proceed=".$id."'>proceed</a>";
}

if(isset($_GET['proceed'])){
       
        $to = "aravindkumaranakr@gmail.com";
        $subject = "Your Order";

        $message ="Your order will be delivered soon.you ordered for ". $string_version=$_SESSION['string']."";
        $headers = "From: fortheotherpurpose04@gmail.com "."\r\n";
        $headers .="MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        mail($to,$subject,$message,$headers);
        header('location:thanks.php');

}
?>
		
</body>
</html>




<!-- View in Browser: Drew's #1 Trending YouTube Tutorial -->

<!-- End View in Browser: Drew's #1 Trending YouTube Tutorial -->


