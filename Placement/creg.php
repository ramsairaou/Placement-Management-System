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
    $name=$_POST['name'];
    $address=$_POST['address'];
    $phone=$_POST['phone'];
    $jobrole=$_POST['jobrole'];
    $package=$_POST['package'];
    try{
    
    $sql="INSERT INTO `placement`.`company`( `CID`,`NAME`, `ADDRESS`, `PHONE`, `JOB_ROLE`,`PACKAGE`) 
    VALUES ('$id','$name','$address','$phone','$jobrole','$package');";
   

    if($con->query($sql))
    {
      
        $insert=true;
        header('location:Company.php');

    }
    else
    {
        echo "error: $sql<br> $con->error";
    }
    $con->close();
}
catch(mysqli_sql_exception $e){
    echo "<script>alert('INVALID PHONE NUMBER LENGTH')</script>";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Company Registration Form</title>
    
    <link rel="stylesheet" href="register.css">
</head>
<body>


<div class="banner">
<a href="Company.php" class="previous round">&#8249;</a>
    



    <div class="container">
    <h1 class="form-title">Company Registration Form</h1>
    <form action="creg.php" method="post">
        <div class="main-user-info">
        <label for="ID"><b>ID:</b></label>
    
        <input type="text" name="id" id="id" placeholder="Enter ID" onkeypress="return event.charCode !=32" autocomplete="off">
        
        
        <label for="name"><b>NAME:</b></label>
        <input type="text" name="name" id="name" placeholder="Enter Company Name" pattern="^[a-zA-Z]+$" title="Invalid Name" onkeypress="return event.charCode !=32" autocomplete="off">
        
       
        <label for="address"><b>ADDRESS:</b></label> 
        <input type="text" name="address" id="address" placeholder="Enter Company Address" autocomplete="off">
        
       
        <label for="phone"><b>PHONE NO:</b></label> 
        <input type="phone" name="phone" id="phone" placeholder=" Enter Company Phone Number" pattern="^[0-9]{10}$" title="Invalid Phone Number" onkeypress="return event.charCode !=32" autocomplete="off">
        
        
        <label for="jobrole"><b>JOBROLE:</b></label> 
        <input type="text" name="jobrole" id="jobrole" placeholder="Enter Job Role" autocomplete="off">
        
       
        <label for="package"><b>PACKAGE:</b></label> 
        <input type="text" name="package" id="package" placeholder="Enter Package" autocomplete="off">
        
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