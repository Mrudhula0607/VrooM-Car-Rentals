<?php 
include('config.php');
session_start();
?>



<?php
if(isset($_POST['login']))
{
  $username=$_POST['username'];
  $password=md5($_POST['password']);
  $sql ="SELECT username,password,userID FROM user_table WHERE username='$username' and password='$password'";
  $result = mysqli_query($dbh,$sql);
  $count = mysqli_num_rows($result);
  if($count > 0)
  {
    $row = mysqli_fetch_array($result);
    $_SESSION['login']=$row["userID"];
    $_SESSION['username']=$row["username"];
    $_POST['id'] = $row['userID'];

    echo "<script type='text/javascript'> window.location.href = 'book_car.php'; </script>";
  }
  else
  {
    echo "<script>alert('Invalid Details');</script>";
  }
}
?>

<!DOCTYPE HTML>
<html lang="en">

<head>
    <title>VrooM Login</title>
    <link rel= "stylesheet" type = "text/css" href = "assets/css/login.css">
    <link rel="stylesheet" href="assets/css/header.css" type="text/css">
</head> 

<body>
<?php include('header.php');?>
    <div class = "logging-in">
        <form method = "post" id="login">
            <h1 > Log In </h1>    
            <br>
            <label id = "label"> User Name </label>
            <br>
            <input type="text" name = "username" id="data" placeholder = "Enter your full name">
            <br><br>
            <label id = "label"> Password </label>
            <br>
            <input type="password" name = "password" id="data" placeholder = "Enter your password">
            <br><br>

            <input type = "submit" name = "login" value = "Login" id="login-btn"> 
            <br><br><br>

            <a id = "register" href = "registration.php"> Not a member? Register Here </a>
        </form>   
    </div>
</body>

</html>