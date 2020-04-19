<?php
include('config.php');
session_start();
?>

<?php
if(isset($_POST['login']))
{
    $email=$_POST['username'];
    $password=$_POST['password'];
    $password=md5($password);
    $check_pass ="SELECT username,password FROM admin_table WHERE admin_table.username='$email' and admin_table.password='$password'";
    $result =mysqli_query($dbh,$check_pass);
    $result_rows=mysqli_num_rows($result);
    if($result_rows > 0)
    {
        $_SESSION['alogin']=$_POST['username'];
        echo "<script type='text/javascript'> document.location = 'change-password.php'; </script>";
    }
    else{
        echo "<script>alert('Invalid Details');</script>";
    }
}

?>

<!DOCTYPE HTML>
<html lang="en">

<head>
    <title>Admin Login</title>
    <link rel= "stylesheet" type = "text/css" href = "assets/css/index.css">
</head> 

<body>
    <div class = "logging-in">
        <form method = "post" id="login">
            <h1 > Log In </h1>    
            <br>
            <label id = "label"> Admin Name </label>
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
