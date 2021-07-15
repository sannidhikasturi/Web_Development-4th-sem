<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "signup";
$con = mysqli_connect($server, $username, $password, $db);
if($con){
    ?>
    <script>
             alert ("connection successful");
    </script>
    <?php
} else {
    ?>
    <script>
             alert ("no connection ");
    </script>
    <?php
}
?>