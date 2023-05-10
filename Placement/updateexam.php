<?php
include 'userwelcome.php';
$con=new mysqli('localhost','root','','placement');

if(!$con)
{
   
    die(mysqli_error($con));
}

$id=$_GET['updateid'];

$date=$_GET['date'];
$cid=$_GET['cid'];


if(isset($_POST['submit']))
{
    echo $id;
    
    $date=$_POST['date'];
    $cid=$_POST['cid'];
   
    $sql="UPDATE `exam` 
    SET `DATE`='$date',CID='$cid'
    WHERE EID='$id'";
    $result=mysqli_query($con,$sql);
    echo $sql;
    if($result)
    {
       
        header('location:Exam.php');
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
    <title>exam updation form</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
<div class="banner">
    <a href="Exam.php" class="previous round">&#8249;</a>
        <div class="container">
        <h1 class="form-title">UPDATION</H1>
<form action="" method="post">
    <div class="main-user-info">
        
        <label for="date"><b>DATE:</b></label>
        <input type="date" name="date" value="<?=$date?>" id="date" placeholder="Enter Date" autocomplete="off">
        
        
        <label for="cid"><b>Company ID:</b></label>
        <input type="text" name="cid" value="<?=$cid?> " id="cid" placeholder="Enter Company ID" onkeypress="return event.charCode !=32">
        
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