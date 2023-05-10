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
    $sql="DELETE FROM student WHERE `student`.`SID` = '$id'";
    $result=mysqli_query($con,$sql);
    if($result)
    {
        
        header("location:Student.php");
    }
    else{
        die(mysqli_error($con));
    }
}

?>