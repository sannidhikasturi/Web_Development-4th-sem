<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<style>
		body  {
  		background-image: url("infinite-loop-01.jpg");
  		background-color: #cccccc;
	  	}
	</style>
	<title>Forgot Company Username/Password</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images1/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor1/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts1/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts1/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor1/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor1/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor1/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor1/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor1/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css1/util.css">
	<link rel="stylesheet" type="text/css" href="css1/main.css">
<!--===============================================================================================-->
<style>
		body  {
  		background-image: url("infinite-loop-01.jpg");
  		background-color: #cccccc;
	  	}
	</style>
</head>
<body>
<?php

include 'dbcon.php';
 if(isset($_POST['submit'])){
   
   $email = mysqli_real_escape_string( $con, $_POST['email']);
   
	
   
   $emailquery = "select * from company_registration where email='$email' ";
   $query = mysqli_query($con,$emailquery );

   $emailcount = mysqli_num_rows($query);
 if( $emailcount) {
	 
	$userdata = mysqli_fetch_array($query);
	$username = $userdata['username'];
	$token = $userdata['token'];
	

	$subject = "Password Reset";
	$body = "Hi $username. Click here to reset your password.            
	http://localhost/company_reset_password.php?token=$token";      // token sent 
	$sender_email = "From: projectworkSRSS@gmail.com";
	
	if(mail($email, $subject, $body, $sender_email)) {
		$_SESSION['msg'] = "Please check your mail to reset password $email";
		header('location: company_login.php');                                                        //CHECK WHICH LOCATION TO DIRECT
	} else {
		echo "Email sending failed...";
	}
 }
else {
	echo "no email found";
}

}
   ?>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
				<form  class="login100-form validate-form" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method = "POST">
					<span class="login100-form-title p-b-33">
						Reset Password
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Enter email" required/>
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="container-login100-form-btn m-t-20">
						<button type= "submit" name= "submit" class="login100-form-btn"  ;> <!-- onclick="alert('Intructions to reset password has been sent to your email id.')-->
							Send Email
						</button>
					</div>

					
				</form>
			</div>
		</div>
	</div>
	

	
<!--===============================================================================================-->
	<script src="vendor1/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor1/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor1/bootstrap/js/popper.js"></script>
	<script src="vendor1/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor1/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor1/daterangepicker/moment.min.js"></script>
	<script src="vendor1/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor1/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js1/main.js"></script>

</body>
</html>
