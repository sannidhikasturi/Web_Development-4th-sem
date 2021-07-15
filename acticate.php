<?php 
session_start();
include 'dbcon.php';
 
if(isset($_GET['token'])){

    $token = $_GET['token'];

 $updatequery = " update registration set status='active' where token='$token' ";
 $query = mysqli_query($con,$updatequery);
  
 if ($query){
     if(isset($_SESSION['msg'])){
         $_SESSION['msg'] = "Account updated successfully";
         header('location: PW_login.php');
     }
     // else {
       // $_SESSION['msg'] = "u are logged out ";
       // header('location: PW_login.php');
    // }
 }
 else {
     $_SESSION['msg'] = " ERROR! Account cannot be updated ";
     header('location: reg.php');
}
 }
?>