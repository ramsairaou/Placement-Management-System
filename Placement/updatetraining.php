<?php
include 'userwelcome.php';
$con=new mysqli('localhost','root','','placement');

if(!$con)
{
   
    die(mysqli_error($con));
}

$id=$_GET['updateid'];

$tname=$_GET['tname'];
$course=$_GET['course'];
$tduration=$_GET['tduration'];

if(isset($_POST['submit']))
{
    echo $id;
    $tname=$_POST['tname'];
    $course=$_POST['course'];
    $tduration=$_POST['tduration'];
   
    $sql="UPDATE `training` 
    SET TNAME='$tname',COURSE='$course',TDURATION='$tduration'
    WHERE TID='$id'";
    $result=mysqli_query($con,$sql);
    echo $sql;
    if($result)
    {
        header('location:Training.php');
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
    <title>Traing updation form</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <div class="banner">
    <a href="Training.php" class="previous round">&#8249;</a>
        <div class="container">
        <h1 class="form-title">UPDATION</H1>
<form action="" method="post">
<div class="main-user-info">
       
        <label for="tname"><b>TRAINER NAME:</b></label>
        <input type="text" name="tname" value="<?=$tname?>" id="tname" placeholder="Enter Trainer Name" pattern="^[a-zA-Z]+$" title="Invalid Name" onkeypress="return event.charCode !=32" autocomplete="off">
        
       
        <label for="course"><b>COURSE:</b></label>
        <input type="text" name="course" value="<?=$course?> " id="course" placeholder="Enter Course"  autocomplete="off">
        
      
        <label for="duration"><b>DURATION:</b></label>
        <input type="text" name="tduration" value="<?=$tduration?>" id="tduration" placeholder="Enter Duration"  autocomplete="off">
        
        <button class="submit" type="submit" name="submit">Submit</button>
        </div>
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