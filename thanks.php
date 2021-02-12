
 




<html>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link  rel="stylesheet" href= "https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css"></script>
  <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
  <script>
  $(document).ready( function () {
    $('#myTable').DataTable({
   // "pagging" = true
    //"ordering" = true
    //"info" = true
    //"serching" = true
    });
} );
  </script>
</head>
<body>
    <div class="container">
    <h1>Thank you!Your will reach you soon</h1>
    <form action="thanks.php" method="POST">
    <p>if you would like to see your this month bill</p>
    <a href = "#myTable" >view</a>
    </form>
    </div>
    <?php 
    session_start();
    $db = mysqli_connect('localhost','root','','foodie'); 
      $result = mysqli_query($db,"SELECT * FROM users"); 
      while($row2=mysqli_fetch_array($result)){
        $id = $row2['id'];
        $name = $row2['name'];
    }
    $display = mysqli_query($db,"SELECT * FROM users WHERE name='$name'");
      $sum = mysqli_query($db,"SELECT SUM(today_amount) total FROM users WHERE name='$name'");
      if(isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['name']);
        header('location:login.php');
    }
      ?>

<table id='myTable' >
        <thead>
        <tr>
        <th>Name</th>
        <th>Date</th>
        <th>Amount</th>
        
        </tr>
        </thead>
        <tbody>
        <?php
        while($row = mysqli_fetch_array($display)): ?>

        <tr>
        <td><?php echo $row['name']; ?></td>  
        <td><?php echo $row['created_at']; ?></td>
        <td><?php echo $row['today_amount']; ?></td>
        
        </tr>
        <?php endwhile; ?>
        </tbody>
        </table>
      <?php  while($row1 = mysqli_fetch_array($sum)): ?>

        <p>sum is:<?php echo $row1['total']; ?></p>
        <?php endwhile; ?>
        <a href="thanks.php?logout='1">logout</a>
    </body>
</html>