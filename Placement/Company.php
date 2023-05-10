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
    <title>Company</title>
    
    <link rel="stylesheet" href="main1.css?v=<?php echo time(); ?>">
</head>
<body>
<div class="banner">
    <div class="navbar">
        <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="Student.php">Student</a></li>
        <li class="active"><a href="Company.php">Company</a></li>
        <li><a href="Training.php">Training</a></li>
        <li><a href="Exam.php">Exam</a></li>
        <li><a href="userlogout.php">Logout</a></li>
        </ul>
    </div>

    <div class="companylist">
    <br>
    <a href="creg.php" class="text-light"><button>Add Company</button></a>
    <a href="viewcompany.php"><button>selected students</button></a>
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
      <th scope="col">Job Role</th>
      <th scope="col">Address</th>
      <th scope="col">Package</th>
      <th scope="col">Operations</th>
    </tr>
    </thead>
    <tbody>
        <?php
        $sql="SELECT * FROM company";
        $result=mysqli_query($con,$sql);
        if($result)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                $id=$row['CID'];
                $name=$row['NAME'];
                $phone=$row['PHONE'];
                $jobrole=$row['JOB_ROLE'];
                $address=$row['ADDRESS'];
                $package=$row['PACKAGE'];

                echo'<tr>
                <td scope="row">'.$id.'</td>
                <td>'.$name.'</td>
                <td>'.$phone.'</td>
                <td>'.$jobrole.'</td>
                <td>'.$address.'</td>
                <td>'.$package.'</td>
                <td>
                <a href="updatecompany.php ? updateid='.$id.'&name='.$name.'&phone='.$phone.'&jobrole='.$jobrole.'&address='.$address.'&package='.$package.'" class="text-light"><button class="update">Update</button></a>
                <a href="deletecompany.php ? deleteid='.$id.'" class="text-light"><button class="deletee">Delete</button></a>
                </td>
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