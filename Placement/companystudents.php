<?php
include 'userwelcome.php';
$con=new mysqli('localhost','root','','placement');
if(!$con)
{
    die(mysqli_error($con));
}

$id=$_GET['viewid'];


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main1.css?v=<?php echo time(); ?>">
    <title>Company Students </title>
</head>
<body>
   <div class="banner">
   <div class="navbar">
        <ul>
        <li><a href ="home.php">Home</a></li>
        <li><a href="Student.php">Student</a></li>
        <li><a href="Company.php">Company</a></li>
        <li><a href="Training.php">Training</a></li>
        <li><a href="Exam.php">Exam</a></li>
        <li><a href="userlogout.php">Logout</a></li>
        </ul>
    </div>
   <div class="backbutton">
    <a href="viewcompany.php" class="back"><button>BACK</button></a>
    </div>

    
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Sl no</th>
      <th scope="col">Name</th>
      <th scope="col">Phone</th>
      <th scope="col">College Name</th>
      <th scope="col">Gpa</th>
      <th scope="col">Tid</th>
      <th scope="col">Cid</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql=" Select * from `student` where CID='$id'";
    $result=mysqli_query($con,$sql);
    if($result)
    {
        while($row=mysqli_fetch_assoc($result))
        {
            $id=$row['SID'];
            $name=$row['SNAME'];
            $phone=$row['SPHONE'];
            $clgname=$row['CLG_NAME'];
            $gpa=$row['GPA'];
            $tid=$row['TID'];
            $cid=$row['CID'];
            
            echo'<tr>
            <td scope="row">'.$id.'</td>
            <td>'.$name.'</td>
            <td>'.$phone.'</td>
            <td>'.$clgname.'</td>
            <td>'.$gpa.'</td>
            <td>'.$tid.'</td>
            <td>'.$cid.'</td>
          </tr>';
        }
    }
    ?> 
    </div>
    </tbody>
    </div>
    </div>
</body>
</html>