<!DOCTYPE html>
<html lang="en">

<head>
<title>Placement | Admin</title>
  <link rel="stylesheet" href="login.css?<?=time()?>">
</head>

<body>
<div class="banner">
  <div class="container">
    <h1 class="form-title">LOGIN </h1>

    <form action="userlogin.php" method="post">
<div class="main-user-info">

<br>
      <lable class="user">USERNAME</label>
        <input type="text" name="username" id="username" placeholder="Enter user name" autocomplete="off">
     

       <lable>PASSWORD</label>
        <input type="password" name="password" id="password" placeholder="Enter password" autocomplete="off">
      </div>
     
      
        <input type="submit" name="login" value="Login" class="submit">
     

    </form>

    

    <?php


  $con=new mysqli('localhost','root','','placement');
  if(!$con)
  {
    die(mysqli_error($con));
  }


    if (isset($_POST['login'])) {
      

      if (empty($_POST['username']) || empty($_POST['password'])) {
        echo '<div class="a">All Fields must be entered.</div>';
        die();
      } else {
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $password = $_POST['password'];

        $sql = "SELECT `username`,`password` FROM `login` WHERE `username` = '{$username}' AND `password`= '{$password}'";
        $result = mysqli_query($con, $sql) or die("Query Failed.");
        $row = mysqli_fetch_assoc($result);
        if (empty($row['username']) || empty($row['password'])) {
          echo "Enter valid username or password";
        } else {
          if ($username == $row['username'] &&  $password == $row['password']) {
            session_start();
            $_SESSION["username"] = $_POST['username'];
            header("Location: home.php");
          } else {
            echo '<div class=>Username and Password are not matched.</div>';
          }
        }
      }
    }
    ?>

  </div>
  </div>
 
</body>

</html>