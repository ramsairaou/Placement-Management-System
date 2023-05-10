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
    <title>Exam</title>
    
    <link rel="stylesheet" href="main1.css?v=<?php echo time(); ?>">
</head>
<body>
<div class="banner">
     <div class="navbar">
        <ul>
        <li ><a href ="home.php">Home</a></li>
        <li><a href="Student.php">Student</a></li>
        <li><a href="Company.php">Company</a></li>
        <li ><a href="Training.php">Training</a></li>
        <li class="active"><a href="Exam.php">Exam</a></li>
        <li><a href="userlogout.php">Logout</a></li>
        </ul>
    </div>
    <div class ="examlist">
    
    <a href="ereg.php" class="text-light"><button>Add Exam</button></a>
    
    <a href="updatemarks.php" class="text-light"><button>Update Results</button></a>  
    <br>
    <br>  
    </div>

    <div class="list">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">EXam ID</th>
      <th scope="col">Date</th>
      <th scope="col">Company ID</th>
      <th scope="col">Operation</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql="SELECT * FROM `exam`";
    $result=mysqli_query($con,$sql);
    if($result)
    {
        while($row=mysqli_fetch_assoc($result))
        {
            $id=$row['EID'];
            $date=$row['DATE'];
            $cid=$row['CID'];
            echo'<tr>
            <td scope="row">'.$id.'</td>
            <td>'.$date.'</td>
            <td>'.$cid.'</td>
            <td>
            <a href="updateexam.php ? updateid='.$id.'&date='.$date.'&cid='.$cid.'" class="text-light"><button class="update">Update</button></a>
            <a href="deleteexam.php ? deleteid='.$id.'" class="text-light"><button class="deletee">Delete</button></a>
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