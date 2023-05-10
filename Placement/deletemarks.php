<?php
include 'userwelcome.php';
$con=new mysqli('localhost','root','','placement');
if(!$con)
{
    die(mysqli_error($con));
}

if(isset($_GET['deleteid']))
{
    $id=$_GET['deleteid'];
    $sql="DELETE FROM attends WHERE `attends`.`EID` = '$eid' and `SID`='$sid'";

    $result=mysqli_query($con,$sql);
    if($result)
    {
        
        header("location:updatemarks.php");
    }
    else{
        die(mysqli_error($con));
    }
}

?>