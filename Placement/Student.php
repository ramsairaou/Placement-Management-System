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
    <title>Student</title>

    <link rel="stylesheet" href="main1.css?v=<?php echo time(); ?>">
</head>

<body>

<div class="banner">
    <div class="navbar">
        <ul>
            <li><a href="home.php">Home</a></li>
            <li class="active"><a href="Student.php">Student</a></li>
            <li><a href="Company.php">Company</a></li>
            <li><a href="Training.php">Training</a></li>
            <li><a href="Exam.php">Exam</a></li>
            <li><a href="userlogout.php">Logout</a></li>
        </ul>
    </div>
   
    
    <div class="stuaddlist">
    <br>
    <a href="sreg.php" class="text-light"><button>Add Student</button></a>

    <a href="studentlist.php" class="text-light"><button>TC STUDENTS</button></a> 
    <br> 
    <br>  
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
      <th scope="col">Operations</th>
    </tr>
  </thead>
 

  <tbody>
    
    <?php
    $sql="Select * from `student`";
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
            <td>
            <a href="updatestudent.php ? updateid='.$id.'& name='.$name.'&phone='.$phone.'&clgname='.$clgname.'&gpa='.$gpa.'&tid='.$tid.'&cid='.$cid.'" class="text-light"><button class="update">Update</button></a>
            <a href="deletestudent.php ? deleteid='.$id.'" class="text-light"><button class="deletee">Delete</button></a>
            </td>
          </tr>';
        }
    }
    ?> 
    <!-- </div> -->
  </tbody>
</table>
</div>
  
</div>
</body>

</html>