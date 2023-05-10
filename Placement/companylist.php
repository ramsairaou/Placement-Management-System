<?php
$con=new mysqli('localhost','root','','placement');
if(!$con)
{
    die(mysqli_error($con));
}
include 'userwelcome.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main1.css?v=<?php echo time(); ?>">
    <title>Company List</title>
</head>
<body>
  <div class="banner">
    <div class="navbar">
        <ul>
        <li><a href="home.html">Home</a></li>
        <li><a href="Student.html">Student</a></li>
        <li class="active"><a href="Company.php">Company</a></li>
        <li><a href="Training.html">Training</a></li>
        <li><a href="Exam.html">Exam</a></li>
        <li><a href="Exam.html">Add Exam</a></li>
        <li><a href="userlogout.php">Logout</a></li>
        </ul>
    </div>

    <div class="list">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Sl no</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Phone</th>
      <th scope="col">JobRole</th>
      <th scope="col">Package</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql="Select * from `company`";
    $result=mysqli_query($con,$sql);
    if($result)
    {
        while($row=mysqli_fetch_assoc($result))
        {
            $id=$row['CID'];
            $name=$row['NAME'];
            $address=$row['ADDRESS'];
            $phone=$row['PHONE'];
            $jobrole=$row['JOB_ROLE'];
            $package=$row['PACKAGE'];
            echo'<tr>
            <td scope="row">'.$id.'</td>
            <td>'.$name.'</td>
            <td>'.$address.'</td>
            <td>'.$phone.'</td>
            <td>'.$jobrole.'</td>
            <td>'.$package.'</td>
            <td>
            <a href="update.php ? updateid='.$id.'" class="text-light"><button class="update">Update</button></a>
            <a href="delete.php ? deleteid='.$id.'" class="text-light"><button class="deletee">Delete</button></a>
            </td>
          </tr>';
        }
    }
    ?> 
   
    </tbody>
    </div>
    
</body>
</html>