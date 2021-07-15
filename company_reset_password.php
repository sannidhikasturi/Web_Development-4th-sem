
<?php

session_start();

ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<style>
		body  {
  		background-image: url("images/infinite-loop-01.jpg");
  		background-color: #cccccc;
	  	}
	</style>
	<title>Reset Password</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images1/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<style>
		body  {
  		background-image: url("images/infinite-loop-01.jpg");
  		background-color: #cccccc;
	  	}
	</style>
</head>
<body>
<?php
include 'dbcon.php';
  if(isset($_POST['submit'])){
	if(isset($_GET['token'])){
  $token = $_GET['token'];
}	else {
	echo "no token found ";
}

	$newpassword =  mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string( $con, $_POST['cpassword']);

	$pass = password_hash($password, PASSWORD_BCRYPT);
	$cpass = password_hash($cpassword, PASSWORD_BCRYPT);

	if($newpassword === $cpassword){
    $updatequery = "update registration set password= '$pass' where token='$token' ";

	
		$iquery = mysqli_query($con, $updatequery);
		if($iquery){
$_SESSION['msg'] = "Your password has been updated ";
header('location: company_login.php');           
		}
		else{
			$_SESSION['passmsg'] = "Password cannot be updated ";
			header('location: company_signup.php'); 
		}
	}
		else{
			$_SESSION['passmsg'] = "Passwords are not matching  ";
		}
	
	}
		
?>
<p> <?php 
				if(isset($_SESSION['passmsg'])){
				echo $_SESSION['passmsg'];  }
				else {
				echo	$_SESSION['passmsg'] = " password cannot be changed ";
				}
				?> </p>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
				
				<form class="login100-form validate-form" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method = "POST">
					<span class="login100-form-title p-b-33">
						Reset Password
					</span>

					<div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
                                        	<input class="input100" type="password" name="password" placeholder="Enter password" required/>
                                        		<span class="focus-input100-1"></span>
                      				        <span class="focus-input100-2"></span>
                    			</div>
					
                                        <div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
                        			<input class="input100" type="password" name="cpassword" placeholder="Confirm password" required/>
                        				<span class="focus-input100-1"></span>
                        				<span class="focus-input100-2"></span>
                    			</div>
					
					<div class="container-login100-form-btn m-t-20">
						<button type="submit" name= "submit" class="login100-form-btn  ">
							Change Password
						</button>
					</div>

					
				</form>
			</div>
		</div>
	</div>
	

	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>