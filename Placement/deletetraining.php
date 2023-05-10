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
    $sql="DELETE FROM training WHERE `training`.`TID` = '$id'";
    echo "$id";
    $result=mysqli_query($con,$sql);
    if($result)
    {
       
        header("location:Training.php");
    }
    else{
        die(mysqli_error($con));
    }
}

?>