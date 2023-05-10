
<?php


$con=new mysqli('localhost','root','','placement');
if(!$con)
{
    die(mysqli_error($con));
}

session_start();

session_unset();

session_destroy();

header("Location: userlogin.php");

?>
