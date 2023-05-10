<?php
include 'userwelcome.php';
if(isset($_POST['id']))
{

    $insert=false;
    $server="localhost";
    $username="root";
    $password="";
    $database="placement";
    $con= mysqli_connect($server,$username,$password,$database);
    if(!$con)
    {
        die("Connection failed" . mysqli_connect_error());
    }
 
    $id=$_POST['id'];
    $tname=$_POST['tname'];
    $course=$_POST['course'];
    $tduration=$_POST['tduration'];

    $sql="INSERT INTO `placement`.`training`( `TID`,`TNAME`, `COURSE`, `TDURATION`) 
    VALUES ('$id','$tname','$course','$tduration');";
  
    if($con->query($sql))
    {
        $insert=true;
        header('location:Training.php');
    }
    else
    {
        echo "error: $sql<br> $con->error";
    }
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Training Registration Form</title>
    
    <link rel="stylesheet" href="register.css">
</head>
<body>
<div class="banner">
    <a href="Training.php" class="previous round">&#8249;</a>
 <div class="container">
    <h1 class="form-title">Training Registration Form</h1>
    <form action="treg.php" method="post">
        <div class="main-user-info">
        <label for="ID"><b>ID:</b></label>
        
        <input type="text" name="id" id="id" placeholder="Enter ID" onkeypress="return event.charCode !=32" autocomplete="off">
        <br>
        
        <label for="tname"><b>TRAINER NAME:</b></label>
        <input type="text" name="tname" id="tname" placeholder="Enter Trainer Name" pattern="^[a-zA-Z]+$" title="Invalid Name" onkeypress="return event.charCode !=32" autocomplete="off">
        <br>
       
        <label for="course"><b>COURSE:</b></label>
        <input type="text" name="course" id="course" placeholder="Enter Course" autocomplete="off">
        <br>
       
        <label for="tduration"><b>DURATION:</b></label>
        <input type="text" name="tduration" id="tduration" placeholder="Enter Duration" autocomplete="off">
        <br>
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