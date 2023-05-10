<?php
include 'userwelcome.php';
$con=new mysqli('localhost','root','','placement');
if(!$con)
    {
        die(mysqli_error($con));
    }
if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $date=$_POST['date'];
    $cid=$_POST['cid'];

    $sql="insert into `exam`(EID,DATE,CID) values('$name','$date','$cid')";
    $result=mysqli_query($con,$sql);
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
    <link rel="stylesheet" href="register.css">
    
    <title>Update exam Details</title>
</head>
<body>
<div class="banner">
<a href="Exam.php" class="previous round">&#8249;</a>
    <div class="container">
    <h1 class="form-title">Exam Details</h1>
        <form method="post">
            <div class="main-user-info">
                <label>Exam ID:</label>
                <input type="text" class="form-control"placeholder="Enter exam ID" onkeypress="return event.charCode !=32" name="name" autocomplete="off">
            
           
                <label>Date:</label>
                <input type="date" class="form-control"placeholder="Enter  Date" name="date" autocomplete="off">
            
        
                <label>Company ID:</label>
                <input type="text" class="form-control"placeholder="Enter Company ID" onkeypress="return event.charCode !=32" name="cid" >
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