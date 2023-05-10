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
    <title>Training</title>
    
    <link rel="stylesheet" href="main1.css?v=<?php echo time(); ?>">
</head>
<body>
<div class="banner">
<div class="navbar">
        <ul>
        <li ><a href ="home.php">Home</a></li>
        <li><a href="Student.php">Student</a></li>
        <li><a href="Company.php">Company</a></li>
        <li class="active"><a href="Training.php">Training</a></li>
        <li><a href="Exam.php">Exam</a></li>
        <li><a href="userlogout.php">Logout</a></li>
        </ul>
    </div>  

    <div class="backbutton">
    <a href="Training.php" class="back"><button>BACK</button></a>
    </div> 
<br>
    <div class="list">
    <table class="table">
    <thead>
    <tr>
      <th scope="col">Sl no</th>
      <th scope="col">Tname</th>
      <th scope="col">Course</th>
      <th scope="col">Tduration</th>
      <th scope="col">No. of Students</th>
      <th scope="col">View</th>
      <th scope="col">Operations</th>
    </tr>
    </thead>
    <tbody>
        <?php
        $sql="SELECT `t`.*,COUNT(*) FROM training t,student s WHERE t.TID=s.TID GROUP BY t.TID;";
        $result=mysqli_query($con,$sql);
        if($result)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                $id=$row['TID'];
                $tname=$row['TNAME'];
                $course=$row['COURSE'];
                $tduration=$row['TDURATION'];
                $count=$row['COUNT(*)'];
            
                echo'<tr>
                <td scope="row">'.$id.'</td>
                <td>'.$tname.'</td>
                <td>'.$course.'</td>
                <td>'.$tduration.'</td>
                <td>'.$count.'</td>
                <td>
                <a href="trainingstudents.php ? viewid='.$id.'" class="text-light"><button class="viewstudent">View Students</button></a>
                </td>
                <td>
                <a href="updatetraining.php ? updateid='.$id.'&tname='.$tname.'&course='.$course.'&tduration='.$tduration.'&count='.$count.'" class="text-light"><button class="update">Update</button></a>
                <a href="deletetraining.php ? deleteid='.$id.'" class="text-light"><button class="deletee">Delete</button></a>
                </td>
                </tr>';
            }
        }
         ?> 
    <!-- </div> -->
    </tbody>
    </div>
</div>
</body>
</html>