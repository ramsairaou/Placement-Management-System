<?php
include 'userwelcome.php';
$con=new mysqli('localhost','root','','placement');
if(!$con)
{
    die(mysqli_error($con));
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main1.css?v=<?php echo time(); ?>">
    <title>Student List</title>
</head>
<body>
  <div class="banner">
    <div class="navbar">
        <ul>
        <li><a href="home.php">Home</a></li>
        <li class="active"><a href="Student.php">Student</a></li>
        <li ><a href="Company.php">Company</a></li>
        <li><a href="Training.php">Training</a></li>
        <li><a href="Exam.php">Exam</a></li>
        <li><a href="userlogout.php">Logout</a></li>
        </ul>
    </div>

    <div class="backbutton">
    <a href="Student.php" class="back"><button>BACK</button></a>
    </div>



    <div class="list">
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
      <th scope="col">Company name</th>
      <th scope="col">Course</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql="SELECT s.SID,s.SNAME,s.SPHONE,s.CLG_NAME,s.GPA,s.TID,s.CID,c.NAME,t.COURSE 
    FROM student s,company c,training t 
    WHERE c.CID=s.CID and t.TID=s.TID;";
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
            $cname=$row['NAME'];
            $course=$row['COURSE'];
            
            echo'<tr>
            <td scope="row">'.$id.'</td>
            <td>'.$name.'</td>
            <td>'.$phone.'</td>
            <td>'.$clgname.'</td>
            <td>'.$gpa.'</td>
            <td>'.$tid.'</td>
            <td>'.$cid.'</td>
            <td>'.$cname.'</td>
            <td>'.$course.'</td>
          </tr>';
        }
    }
    ?> 
   
    </tbody>
</table>
  </div>
    </div>
</body>
</html>