<?php 
include('config.php');
?>

<?php
if(isset($_POST['submit']))
{
    if( $_POST['password'] != ($_POST['repassword']))
    {
        echo '<script>alert("Password and Confirm Password Field do not match")</script>'; 
    }
    else
    {
        $username = $_POST['fullname'];
        $email = $_POST['email']; 
        $phone = $_POST['phone'];
        $password = md5($_POST['password']); 
        $address = $_POST['address'];
        $state = $_POST['state'];
        $sql="call create_user('$username','$password','$email','$phone','$address','$state')";
        $result = mysqli_query($dbh,$sql);
        if($result)
        {
            echo "<script type='text/javascript'>
            alert('Registration successfull. Now you can login');
            window.location.href = 'login.php';
            </script>";
        }
        else 
        {
            echo "<script type='text/javascript'>
            alert('Something went wrong. Please try again');
            </script>";
        }
    }
}
?>


<!DOCTYPE HTML>
<html lang="en">

<head>
    <title>Registration Form</title>
    <link rel= "stylesheet" type = "text/css" href = "assets/css/registration.css">
    <link rel="stylesheet" href="assets/css/header.css" type="text/css">
</head> 

<body>
    <?php include('header.php');?>
    <div class = "registration">
    
        <form method = "post" id="register">
        <h1 > Registration Form </h1>
        <br>
            <label id = "label"> Full Name </label>
            <br>
            <input type="text" name = "fullname" id="data" placeholder = "Enter your full name">
            <br><br>

            <label id = "label"> E-Mail </label>
            <br>
            <input type="text" name = "email" id="data" placeholder = "Enter your e-mail id">
            <br><br>

            <label id = "label"> Phone Number </label>
            <br>
            <input type="text" name = "phone" id="data" placeholder = "Enter your phone number">
            <br><br>

            <label id = "label"> Password </label>
            <br>
            <input type="password" name = "password" id="data" placeholder = "Enter your password">
            <br><br>

            <label id = "label"> Confirm password </label>
            <br>
            <input type="password" name = "repassword" id="data" placeholder = "Enter your password again">
            <br><br>

            <label id = "label"> Address </label>
            <br>
            <textarea rows = "5"  name = "address" id = "data" > Enter details here...</textarea><br>
            <br>

            <label id = "label"> State </label>
            <br>
            <input type="text" name = "state" id="data" placeholder = "Enter your state">
            <br><br>

            <input type = "submit" name = "submit" value = "Submit" id="submit"> 
            <br><br><br>

            <a id = "login" href = "login.php"> Already a member? Login Here </a>

        </form>   
    </div>
</body>

</html>