<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en" >
<style>
div {
  background-image: url('images/infinite-loop-01.jpg');
}
</style>

<head>
  <meta charset="UTF-8">
  <title>Thank You Page</title>
  
  
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css'>

</head>

<body>
  <div class="jumbotron text-xs-center">
  <h1 class="display-3" style="color:powderblue;">Thank You!</h1>
  <p class="lead" style="color:powderblue;"><strong>If you get selected then the respective company will notify you soon! </strong></p>
  <hr>
  <p style="color:white;">
    Having trouble? <a href="homepage.php#contact">Contact us</a>
  </p>
  <p class="lead">
    <a class="btn btn-primary btn-sm" onclick="location.href='homepage.php';" role="button">Continue to homepage</a>


  </p>
  <p style="color:white;">
    <a href="index1.php">Log out</a>
  </p>
</div>

</body>

</html>
