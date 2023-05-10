<?php
include 'userwelcome.php';
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

if(isset($_POST['submit']))
{


    $eid=$_POST['eid'];
    $sid=$_POST['sid'];
    $marks=$_POST['marks'];

    $sql="INSERT INTO `placement`.`attends`( `EID`,`SID`, `MARKS`) 
    VALUES ('$eid','$sid','$marks');";
    

    if($con->query($sql))
    {
       
        $insert=true;
        echo "<script>alert('Data inserted successfully')</script>";
    }
    else
    {
        echo "error: $sql<br> $con->error";
    }
    
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="exam.css">
    <title>Update Marks</title>
</head>

<body>
    

    <div class="banner">
    
    <a href="Exam.php" class="previous round">&#8249;</a>
  <br>
  <br>
    <div class=left>
    <div class="container">
    <h1 class="form-title">Result Updation</h1>
    <form action="" method="post">
      <div class="main-user-info">
        <label for="">EID:</label>
        <input type="text" name="eid" placeholder="Enter EID" onkeypress="return event.charCode !=32">
        
        <label for="">SID:</label>
        <input type="text" name="sid" placeholder="Enter SID" onkeypress="return event.charCode !=32">
        
        <label for="">MARKS:</label>
        <input type="text" name="marks" placeholder="Enter Marks" onkeypress="return event.charCode !=32" autocomplete="off">
        
        </div>
        <button class="submit" type="submit" name="submit">Submit</button>
    </form>  
    </div>
    </div>

    <div class="right">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">EID</th>
      <th scope="col">SID</th>
      <th scope="col">STUDENT NAME</th>
      <th scope="col">PHONE</th>
      <th scope="col">COLLEGE</th>
      <th scope="col">MARKS</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql="SELECT a.EID,a.SID,s.SNAME,s.SPHONE,s.CLG_NAME,a.MARKS
    FROM student s,attends a
    WHERE s.SID=a.SID;";
    $result=mysqli_query($con,$sql);
    if($result)
    {
        while($row=mysqli_fetch_assoc($result))
        {
            $eid=$row['EID'];
            $sid=$row['SID'];
            $sname=$row['SNAME'];
            $phone=$row['SPHONE'];
            $clg=$row['CLG_NAME'];
            $marks=$row['MARKS'];
            
            echo'<tr>
            <td scope="row">'.$eid.'</td>
            <td>'.$sid.'</td>
            <td>'.$sname.'</td>
            <td>'.$phone.'</td>
            <td>'.$clg.'</td>
            <td>'.$marks.'</td>
          </tr>';
        }
    }
    ?> 
    </div>
    </tbody>

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