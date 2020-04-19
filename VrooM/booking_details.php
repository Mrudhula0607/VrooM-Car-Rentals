<?php 
include('config.php');
session_start();
?>

<?php
    $userID = $_SESSION["login"];
    $query = "select * from user_table where userID = '$userID' ";  
    $result = mysqli_query($dbh, $query);      
    $row = mysqli_fetch_array($result);
    $userEmail = $row['email'];  
    $username = $row['username'];
?>  


<html>

<head>
    <title>Booking Details </title>
    <link rel="stylesheet" href="assets/css/booking_details.css" type="text/css" >
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<div class = "container">
    <br><br><br>
    <h1 class = "heading"><?php echo $username?> 's Bookings </h1>
    <br>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>CAR</th>
                <th>BRAND</th>
                <th>FROM DATE</th>
                <th>TO DATE</th>
                <th>COST</th>
                <th>STATUS</th>
            </tr>
            
        </thead>

        <tbody>
            <?php
                $list_booking = "select name,brand_name,from_date,to_date,cost,position from booking_details join vehicle_data on vehicle_ID = vehicleID join brand on brand = brandID where booking_details.email_id = '$userEmail'";
                $result = mysqli_query($dbh, $list_booking);      
                $number_of_rows = mysqli_num_rows($result);
                if($number_of_rows > 0)
                {
                    while($row = mysqli_fetch_array($result))
                    {
            ?>
            <tr>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['brand_name'] ?></td>
                <td><?php echo $row['from_date'] ?></td>
                <td><?php echo $row['to_date'] ?></td>
                <td><?php echo $row['cost'] ?></td>
                <td><?php echo $row['position'] ?></td>
            </tr>
            <?php
                   }
                }  ?>
        </tbody>
    </table>
    
    <a href="logout.php" class="btn btn-success">LOGOUT AND GO HOME</a>
</div>
</body>

</html>