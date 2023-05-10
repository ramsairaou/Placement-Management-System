<?php
include 'userwelcome.php';
if(isset($_POST['id']))
{

    $insert=false;
    $server="localhost";
    $username="root";
    $password="";
    $con= mysqli_connect($server,$username,$password);
    if(!$con)
    {
        die("Connection failed" . mysqli_connect_error());
    }
    
    $id=$_POST['id'];
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $clg=$_POST['college'];
    $gpa=$_POST['gpa'];
    try{

   
    if($_POST['tid']==null&&$_POST['cid']==null){
        $sql="INSERT INTO `placement`.`student`(`SID`, `SNAME`, `SPHONE`, `CLG_NAME`, `GPA`) 
        VALUES ('$id','$name','$phone','$clg','$gpa');";
    }
    else if($_POST['tid']==null){
        $cid=$_POST['cid'];
        $sql="INSERT INTO `placement`.`student`(`SID`, `SNAME`, `SPHONE`, `CLG_NAME`, `GPA`,`CID`) 
        VALUES ('$id','$name','$phone','$clg','$gpa','$cid');";
    }
    else if($_POST['cid']==null){
        $tid=$_POST['tid'];
        $sql="INSERT INTO `placement`.`student`(`SID`, `SNAME`, `SPHONE`, `CLG_NAME`, `GPA`,`TID`) 
        VALUES ('$id','$name','$phone','$clg','$gpa','$tid');";
    }
   
else{
    $tid=$_POST['tid'];
    $cid=$_POST['cid'];
    $sql="INSERT INTO `placement`.`student`(`SID`, `SNAME`, `SPHONE`, `CLG_NAME`, `GPA`,`TID`,`CID`) 
    VALUES ('$id','$name','$phone','$clg','$gpa','$tid','$cid');";
}
    
    $result=mysqli_query($con,$sql);
    if($result)
    {
        
        header('location:Student.php');
    }
    else
    {
        die(mysqli_error($con));
    }
}
catch(mysqli_sql_exception $e){
    echo "<script>alert('MINIMUM REQUIRED GPA IS 5')</script>";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
    
    <link rel="stylesheet" href="register.css">
</head>
<body>
    


    <div class="banner">
    <a href="Student.php" class="previous round">&#8249;</a>
    
    <div class="container">
    <h1 class="form-title">Student Registration Form</h1>
    <form action="sreg.php" method="post">
        <div class="main-user-info">
        <label for="ID"><b>ID:</b></label>
       
        <input type="text" name="id" id="id" placeholder="Enter ID" onkeypress="return event.charCode !=32" autocomplete="off">
        
        
        
        <label for="Name"><b>NAME:</b></label>
        <input type="text" name="name" id="name" placeholder="Enter Name" onkeypress="return event.charCode !=32" pattern="^[a-zA-Z]+$" title="Invalid Name" autocomplete="off">
        
        
        <label for="Phone"><b>PHONE NO:</b></label>
        <input type="phone" name="phone" id="phone" placeholder=" Enter Phone Number" pattern="^[0-9]{10}$" title="Invalid Phone number" onkeypress="return event.charCode !=32" autocomplete="off">
        
        
        <label for="clgname"><b>COLLEGE:</b></label>
        <input type="text" name="college" id="college" placeholder="Enter College" autocomplete="off">
        
       
        <label for="gpa"><b>GPA:</b></label>
        <input type="text" name="gpa" id="gpa" placeholder="Enter GPA" onkeypress="return event.charCode !=32" autocomplete="off">
        
        
        <label for="tid"><b>TRAINING ID:</b></label>
        <input type="text" name="tid" id="tid" placeholder="Enter Training ID" onkeypress="return event.charCode !=32">
        
       
        <label for="cid"><b>COMPANY ID:</b></label>
        <input type="text" name="cid" id="cid" placeholder="Enter Company ID" onkeypress="return event.charCode !=32" >
        
        </div>
        <button class="submit">Submit</button>
    </form>
</div>
</div>
<script>$("input#UserName").on({
    keydown: function(e) {
      if (e.which === 32)
        return false;
    },
    change: function() {
      this.value = this.value.replace(/\s/g, "");
    }
});

</script>
</body>
</html>