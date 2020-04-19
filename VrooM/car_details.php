<?php 
session_start();
include('config.php');
error_reporting(0);
?>


<?php
    $id = $_POST["hidden_id"];

    $sql = "select * from vehicle_data join brand on brand = brandID where vehicleID = '$id'";
    $result = mysqli_query($dbh, $sql);  
    $row = mysqli_fetch_array($result);

    $vehID = $row["vehicleID"];
    $_SESSION['vehilce_ID'] = $vehID;

?>

<?php
if(isset($_POST['book']))
{
    $from = strtotime($_POST['fromdate']);
    $to = strtotime($_POST['todate']);
    $count = ($to - $from)/60/60/24;
    $_SESSION['number_of_days'] = $count;
    $_SESSION['fromdate'] = $_POST['fromdate'];
    $_SESSION['todate'] =  $_POST['todate'];
   echo "<script type='text/javascript'> window.location.href = 'login.php'; </script>";   
}

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <title><?php echo $row["name"]; ?></title>
    <link rel="stylesheet" href="assets/css/car_details.css" type="text/css">
    <link rel="stylesheet" href="assets/css/header.css" type="text/css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body>

<?php include('header.php');?>
<?php 
    $_SESSION["last_try"] = $row['name'];?>
<section class="listing-detail">
  <div class="container">
    <div class="listing_detail_head row">
        <div class="col-md-9"> 
            <h1> <?php echo $row["name"];?></h1>
            <br>
        </div>
        
        <div class="col-md-9"> 
            <h3>Brand</h3>
            <p> <?php  echo $row["brand_name"];?> </p>
            <br>
        </div>
        
        <div class="col-md-3">
            <div class="price_info">
            <h3> Cost per day </h3>  
                <h3>Rs. <?php echo $row["price_per_day"];?> &nbsp;&nbsp;&nbsp;&nbsp;</h3>
            </div>
        </div>
        
        <div class="col-md-9"> 
            <h3> Overview </h3>  
            <p><?php echo $row["overview"]; ?></p>
            <br>
            <br>
        </div>

        <div class="col-md-3">
            <br>
            <div class="sidebar_widget">
                <div class="widget_heading">
                    <i class="fa fa-envelope" aria-hidden="true"></i> &nbsp;&nbsp;Book Now
                </div>

            <form method="post">
                <div class="form-group">
                    <label>From Date</label>
                    <input type="date" class="form-control" name="fromdate" placeholder="(dd/mm/yyyy)" required>
                </div>

                <div class="form-group">
                    <label>To Date</label>
                    <input type="date" class="form-control" name="todate" placeholder="(dd/mm/yyyy)" required>
                </div>

                <div class="form-group">
                <input type ="submit" class="btn btn-info" Value ="Login To Book" name ="book" >
                </div>
            </form>
            </div>
        </div>

        <div class="col-md-9"> 
            <h3> Images </h3>  
                <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image1'] ).'" height="250" width="400" class="img-thumnail" /> '?>
                &nbsp; &nbsp; &nbsp;
                <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image2'] ).'" height="250" width="400" class="img-thumnail" /> '?>
            <br>
            <br>
        </div>    
    </div>

    <div class="row">
      <div class="col-md-9">
        <div class="main_features">
            <br>
            <h3>Main Features</h3>
            <br>
          <ul>
            <li> <i class="fa fa-calendar" aria-hidden="true"></i>
                <h5><?php echo $row["model_year"];?></h5>
                <p>Reg.Year</p>
            </li>
          
            <li> <i class="fa fa-cogs" aria-hidden="true"></i>
                <h5><?php echo $row["fuel"];?></h5>
                <p>Fuel Type</p>
            </li>
       
            <li> <i class="fa fa-user-plus" aria-hidden="true"></i>
                 <h5><?php echo $row["seating_capacity"];?></h5>
                <p>Seats</p>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <br><br>
        <div class="listing_more_info">
          <div class="listing_detail_wrap"> 
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th colspan="2"><h3>Accessories<h3></th>
                    </tr>
                  </thead>

                  <tbody>
                        <tr>
                           <td>Air Conditioner</td>
                            <?php if($row["air_conditioner"]==1)
                            {
                            ?>
                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php } else { ?> 
                            <td><i class="fa fa-close" aria-hidden="true"></i></td>
                            <?php } ?> 
                        </tr>

                        <tr>
                            <td>AntiLock Braking System</td>
                            <?php if($row["antibreaklocking_system"]==1)
                            {
                            ?>
                            <td><i  class="fa fa-check" aria-hidden="true"></i></td>
                            <?php } else {?>
                            <td><i class="fa fa-close" aria-hidden="true"></i></td>
                            <?php } ?>
                        </tr>

                        <tr>
                            <td>Power Steering</td>
                            <?php if($row["power_steering"]==1)
                            {
                            ?>
                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php } else { ?>
                            <td><i class="fa fa-close" aria-hidden="true"></i></td>
                            <?php }  ?>
                        </tr>
                   
                        <tr>
                            <td>Power Windows</td>
                            <?php if($row["power_window"]==1)
                            {
                            ?>
                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php } else { ?>
                            <td><i class="fa fa-close" aria-hidden="true"></i></td>
                            <?php } ?>
                        </tr>
                   
                        <tr>
                            <td>Music Player</td>
                            <?php if($row["music_player"]==1)
                            {
                            ?>
                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php } else { ?>
                            <td><i class="fa fa-close" aria-hidden="true"></i></td>
                            <?php } ?>
                        </tr>

                        <tr> 
                            <td>Leather Seats</td>
                            <?php if($row["leather_seats"]==1)
                            {
                            ?>
                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php } else { ?>
                            <td><i class="fa fa-close" aria-hidden="true"></i></td>
                            <?php } ?>
                        </tr>

                        <tr>        
                            <td>Central Locking</td>
                            <?php if($row["central_locking"]==1)
                            {
                            ?>
                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php } else { ?>
                            <td><i class="fa fa-close" aria-hidden="true"></i></td>
                            <?php } ?>
                        </tr>

                        <tr>        
                            <td>Power Door Locks</td>
                            <?php if($row["powerdoor_lock"]==1)
                            {
                            ?>
                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php } else { ?>
                            <td><i class="fa fa-close" aria-hidden="true"></i></td>
                            <?php } ?>
                        </tr>
            
                        <tr>
                            <td>Brake Assist</td>
                            <?php if($row["breakassit"]==1)
                            {
                            ?>
                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php  } else  { ?>
                            <td><i class="fa fa-close" aria-hidden="true"></i></td>
                            <?php } ?>
                        </tr>

                        <tr>
                            <td>Airbags</td>
                            <?php if($row["air_bag"]==1)
                            {
                            ?>
                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php } else { ?>
                            <td><i class="fa fa-close" aria-hidden="true"></i></td>
                            <?php } ?>
                        </tr>
 
                        <tr>    
                            <td>Crash Sensor</td>
                            <?php if($row["crash_sensor"]==1)
                            {
                            ?>
                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php } else { ?>
                            <td><i class="fa fa-close" aria-hidden="true"></i></td>
                            <?php } ?>
                        </tr> 
                    </tbody>
                </table>
              </div>
            </div>
          </div>          
        </div>
    </div>
</section>      
</body>
</html>