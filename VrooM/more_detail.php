<?php 
    include('config.php');
?>

<?php
    //glyphicon glyphicon-piggy-bank   glyphicon glyphicon-ok   glyphicon glyphicon-remove
    $id = $_POST["hidden_id"];
    $sql = "select * from vehicle_data where vehicleID = '$id'";
    $result = mysqli_query($dbh, $sql);  
    $row = mysqli_fetch_array($result);

?>
<!DOCTYPE html>  
<html> 
<head>
    <title><?php echo $row["name"]; ?></title>
    <link rel="stylesheet" href="assets/css/header.css" type="text/css">
    <link rel="stylesheet" href="assets/css/more_info.css" type="text/css">

    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>


<body>

<?php include('header.php');?>
<br /> 
<div class="container">
  <h2><?php echo $row["name"]; ?></h2>
  <p><?php echo $row["overview"]; ?></p>
  <br>
  <br>
  
  <h3> Images </h3>  
    <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image1'] ).'" height="300" width="500" class="img-thumnail" /> '?>
    <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image2'] ).'" height="300" width="500" class="img-thumnail" /> '?>
  <br>
  <br>
</div>
<section class="listing-detail">
<div class="row">
  <div class="col-md-9">
  <div class="listing_detail_head row">
  <div class="col-md-9">
        <h2><?php echo htmlentities($row["brand_name"]);?> </h2>
        <h2><?php echo htmlentities($result->name);?></h2>
      </div>
      <div class="col-md-3">
        <div class="price_info">
          <p>$<?php echo htmlentities($row["price_per_day"]);?> </p>Per Day
         
        </div>
      </div>
    </div>
    <div class="main_features">
      <ul>
        <h3> 
         Accessories
        </h3>
        
        <li> <i class="fa fa-calendar" aria-hidden="true"></i>
             <h5><?php echo htmlentities($row["model_year"]);?></h5>
             <p>Reg.Year</p>
        </li>
          
        <li> <i class="fa fa-cogs" aria-hidden="true"></i>
             <h5><?php echo htmlentities($row["fuel"]);?></h5>
             <p>Fuel Type</p>
        </li>
       
        <li> <i class="fa fa-user-plus" aria-hidden="true"></i>
             <h5><?php echo htmlentities($row["seating_capacity"]);?></h5>
             <p>Seats</p>
        </li>
      </ul>
    </div>
        
    <div role="tabpanel" class="tab-pane" id="accessories"> 
                <!--Accessories-->
    <table>
          <thead>
              <tr>
                <th colspan="2">Accessories</th>
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
                <td><i class="fa fa-check" aria-hidden="true"></i></td>
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
              <?php  } else { ?>
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
</section>
</body>
<html>
 