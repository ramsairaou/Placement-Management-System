<?php
include 'userwelcome.php';
$con=new mysqli('localhost','root','','placement');

if(!$con)
{
    
    die(mysqli_error($con));
}

$id=$_GET['updateid'];
$name=$_GET['name'];
$phone=$_GET['phone'];
$college=$_GET['clgname'];
$gpa=$_GET['gpa'];
$tid=$_GET['tid'];
$cid=$_GET['cid'];

if(isset($_POST['submit']))
{
    echo $id;
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $college=$_POST['college'];
    $gpa=$_POST['gpa'];
    $tid=$_POST['tid'];
    $cid=$_POST['cid'];

    $sql="UPDATE `student` 
    SET `SNAME`='$name',`SPHONE`='$phone',`CLG_NAME`='$college',`GPA`='$gpa',`TID`='$tid',`CID`='$cid' 
    WHERE `SID`='$id'";
    $result=mysqli_query($con,$sql);
    if($result)
    {
        //echo"Data updated successfully";
        header('location:studentlist.php');
    }
    else
    {
        die(mysqli_error($con));
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student updation from</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <div class="banner">
    <a href="Student.php" class="previous round">&#8249;</a>
        <div class="container">
        <h1 class="form-title">UPDATION</H1>
<form action="" method="post">
<div class="main-user-info">
       
        <label for="Name"><b>NAME:</b></label>
        <input type="text" name="name" id="name"value="<?=$name?>" placeholder="Enter Name" onkeypress="return event.charCode !=32" pattern="^[a-zA-Z]+$" title="Invalid Name" autocomplete="off">
       
     
        <label for="Phone"><b>PHONE NO:</b></label>
        <input type="phone" name="phone" id="phone" value="<?=$phone?>"placeholder=" Enter Phone Number" pattern="^[0-9]{10}$" onkeypress="return event.charCode !=32" title="Invalid Phone number" autocomplete="off">
       
       
        <label for="clgname"><b>COLLEGE:</b></label>
        <input type="text" name="college" id="college" value="<?=$college?>"placeholder="Enter College" autocomplete="off">
    
        
        <label for="gpa"><b>GPA:</b></label>
        <input type="text" name="gpa" id="gpa"value="<?= $gpa?>" placeholder="Enter GPA" onkeypress="return event.charCode !=32" autocomplete="off">
      
      
        <label for="tid"><b>TRAINING ID:</b></label>
        <input type="text" name="tid" id="tid"value="<?= $tid?>"placeholder="Enter Training ID" onkeypress="return event.charCode !=32">
       
       
        <label for="cid"><b>COMPANY ID:</b></label>
        <input type="text" name="cid" id="cid" value="<?=$cid?>"placeholder="Enter Company ID" onkeypress="return event.charCode !=32">
        
        </div>
        <button class="submit" type="submit" name="submit">Submit</button>
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