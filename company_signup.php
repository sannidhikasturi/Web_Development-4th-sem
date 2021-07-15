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
	<title>Company Sign Up</title>
	   
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
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
    $company_name = mysqli_real_escape_string( $con, $_POST['company_name']);
    $email = mysqli_real_escape_string( $con, $_POST['email']);
    $contactnumber = mysqli_real_escape_string( $con, $_POST['contactnumber']);
    $password =  mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string( $con, $_POST['cpassword']);
     
	$pass = password_hash($password, PASSWORD_BCRYPT);
	$cpass = password_hash($cpassword, PASSWORD_BCRYPT);
    $token = bin2hex(random_bytes(15));

	$emailquery = "select * from company_registration where email='$email' ";
	$query = mysqli_query($con,$emailquery );

	$emailcount = mysqli_num_rows($query);
	if($emailcount>0){
		echo "email already exists";

	}
	else{
		if($password === $cpassword){
            $insertquery = "insert into company_registration( company_name , email, contactnumber, password, cpassword, token, status ) values ('$company_name','$email','$contactnumber', '$pass','$cpass', '$token','inactive')";
             $iquery = mysqli_query($con, $insertquery);
			if($iquery){
				
                $subject = "Email Activation";
                $body = "Hi, $company_name. Click here to activate your account. 
				http://localhost/companyemail_activate.php?token=$token ";          
                $sender_email = "From: projectworkSRSS@gmail.com";

if(mail($email, $subject, $body, $sender_email)) {
   $_SESSION['msg'] = "Check your mail to activate your account $email " ;
   header('location: company_login.php'); 
} else {
    echo "Email sending failed...";
}
			} else {
				?>
				<script>
						 alert ("no connection ");
				</script>
				<?php
			}
			

		}
		else{
			echo "passwords are not matching ";
		}
	}

}
    ?>


	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
				<form class="login100-form validate-form" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>"  method="POST">
					<span class="login100-form-title p-b-33">
						Enter your details
					</span>
                    <div class="wrap-input100 rs1 validate-input" data-validate="Name is required">
						<input class="input100" type="textfield" name="company_name" placeholder="Enter company name" required/>
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="email" name="email" placeholder="Enter email id">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

                                                                                      <div class="wrap-input100 validate-input" data-validate = "Contact number required">
						<input class="input100" type="tel" name="contactnumber" placeholder="Enter contact number" required/>
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div clss="wrap-input100 rs1 validate-input" data-validate="Password is required">
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
						<button type="submit" name="submit" class="login100-form-btn");>
							Sign up
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