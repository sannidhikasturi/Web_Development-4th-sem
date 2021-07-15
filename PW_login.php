<?php 
session_start();
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
	<title>Login</title>
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

if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $email_search = "select * from registration where email='$email' and status='active'  ";
    $query = mysqli_query($con,$email_search );
    $email_count = mysqli_num_rows($query);

    if($email_count){
        $email_pass = mysqli_fetch_assoc($query);
        $db_pass = $email_pass['password'];
        $_SESSION['username']= $email_pass['username'];
        $pass_decode = password_verify($password,$db_pass);

        if($pass_decode){
          echo "login successful";
          // header('location:)   DIRECT TO HOMEPAGE                    
        }
        else 
        {
            echo "password incorrect";
        }
    }
        else{
            echo "invalid email";
        }
    
}
?>	

<div>
<p>  <?php 
if (isset($_SESSION['msg'])){
echo $_SESSION['msg']; }

?> </p>
</div>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
			
				<form class="login100-form validate-form" action="homepage.php" method="POST"  enctype="multipart/form-data" onsubmit='return(checkform())';>
					<span class="login100-form-title p-b-33">
						Applicant Login
					</span>
					

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="email" name="email" placeholder="Email" required/>
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
						<input class="input100" type="password" id="pw" name="password" placeholder="Password" required/>
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="container-login100-form-btn m-t-20">
						<button name="submit" onclick="location.href='homepage.php';" class="login100-form-btn">
							Sign in
						</button>
					</div>
				
                                       
					 <div class="text-center p-t-45 p-b-4">
						<span class="txt1">
							
						</span> 

						<p class="text center ">Forgot your password? <a href="forgotpassword.php" >Click here</a> </p>
							
					</div>

					<div class="text-center">
						<span class="txt1">
							New to our website? 
						</span>

						<a onclick="location.href='reg.php';"class="txt2 hov1">
							Sign up
							
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
<!--	
<script type='text/javascript'>
function checkform(){
    if(document.getElementById("pw").value == '123'){
        alert("Login Successful");
        setTimeout(function() {window.location = "homepage.html" });
    }else{
        alert("Access denied. Valid username and password is required.");
    }
}
</script>
	-->
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
