<?php 
include('config.php');
session_start();
?>

<?php
    $count = $_SESSION["number_of_days"];
    $userID = $_SESSION["login"];
    $fromdate = $_SESSION['fromdate'];
    $todate = $_SESSION['todate'];
    $vehicleID = $_SESSION['vehicle_ID'];
    $vehicleID = 12;

    $query = "select * from vehicle_data where vehicleID = '$vehicleID' ";  
    $result = mysqli_query($dbh, $query);      
    $row = mysqli_fetch_array($result);
    $cost = $row['price_per_day'];
    $totalcost = $cost * $count;

    $query = "select * from user_table where userID = '$userID' ";  
    $result = mysqli_query($dbh, $query);      
    $row = mysqli_fetch_array($result);
    $userEmail = $row['email'];  
    $userphone = $row['phone_number'];

    $insert_booking = "call insert_booking('$vehicleID','$userEmail','$userphone','$fromdate','$todate','$count','$totalcost')";  
    $result = mysqli_query($dbh, $insert_booking);
    if($result)
    {
        echo "<script>alert('Booked Successfully');</script>";
        echo "<script type='text/javascript'> window.location.href = 'booking_details.php'; </script>";
    }    
        
    else
    {
        echo "<script>alert('Invalid Details');</script>";
        echo "<script type='text/javascript'> window.location.href = 'car_listing.php'; </script>";
    }
?>