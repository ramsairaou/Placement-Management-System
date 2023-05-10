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
$jobrole=$_GET['jobrole'];
$address=$_GET['address'];
$package=$_GET['package'];


if(isset($_POST['submit']))
{
    echo $id;
    
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $jobrole=$_POST['jobrole'];
    $address=$_POST['address'];
    $package=$_POST['package'];

    $sql="UPDATE `company` 
    SET `NAME`='$name',`PHONE`='$phone',`JOB_ROLE`='$jobrole',`ADDRESS`='$address',`PACKAGE`='$package'
    WHERE `CID`='$id'";
    $result=mysqli_query($con,$sql);
    if($result)
    {
        
        header('location:Company.php');
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
    <title>company updation form</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <div class="banner">
    <a href="Company.php" class="previous round">&#8249;</a>
        <div class="container">
        
        <h1 class="form-title">UPDATION</H1>
<form action="" method="post">
<div class="main-user-info">
       
        
       
        <label for="name"><b>NAME:</b></label>
        <input type="text" name="name" id="name" value="<?=$name?>" placeholder="Enter Company Name" pattern="^[a-zA-Z]+$" title="Invalid Name" onkeypress="return event.charCode !=32" autocomplete="off">

       
        <label for="Phone"><b>PHONE NO:</b></label>
        <input type="phone" name="phone" id="phone" value="<?=$phone?>"placeholder=" Enter Company Phone Number"  pattern="^[0-9]{10}$" title="Invalid Phone Number" onkeypress="return event.charCode !=32" autocomplete="off">

        
        <label for="jobrole"><b>JOB ROLE:</b></label>
        <input type="text" name="jobrole" id="jobrole" value="<?=$jobrole?>"placeholder="Enter Job Role" autocomplete="off">

        
        <label for="address"><b>ADDRESS:</b></label>
        <input type="text" name="address" id="address"value="<?= $address?>" placeholder="Enter Company Address" autocomplete="off">

       
        <label for="package"><b>PACKAGE:</b></label>
        <input type="text" name="package" id="package"value="<?= $package?>"placeholder="Enter Package" autocomplete="off">

        
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