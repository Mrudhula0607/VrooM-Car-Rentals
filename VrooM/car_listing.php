<?php 
    include('config.php');
?>
<!DOCTYPE html>  
<html>  
    <head>  
           <title>VrooM Cars</title>  
           <link rel="stylesheet" href="assets/css/header.css" type="text/css">
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    </head>  

    <body>  
    <?php include('header.php');?>
    <br />  
           <div class="container bg-info" style="width:100%; background-color: aliceblue;">  
                <h3 align="center">
                    VrooM Car Listing
                </h3><br />  
                <?php  
                    $query = "SELECT * FROM vehicle_data  ";  
                    $result = mysqli_query($dbh, $query);      
                    while($row = mysqli_fetch_array($result))  
                    {  
                ?>  
                <div class="col-lg-4">  
                    <div style="border:2px solid #333; background-color:#f1f1f1; border-radius:5px; padding:18px;" align="center"> 
                                <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image1'] ).'" height="150" width="300" class="img-thumnail" /> '?> 
                               <h4 class="text-info"><?php echo $row["name"]; ?></h4>  
                               <h4 class="text-danger">Rs <?php echo $row["price_per_day"]; ?> per day</h4>  

                               <form method = "post" action="car_details.php">
                               
                               <input type="hidden" name="hidden_id" value="<?php echo $row["vehicleID"]; ?>" />  
                               <input type = "submit" name = "more" value = "More Details.." id="more" class="btn btn-primary"> 
                               
                               </form>
                    </div>  
                </div>  
                <?php  
                     }  
                
                ?>  
                <br /> 
            </div>  
           <br />  
    </body>
<html>
 