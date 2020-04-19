<?php
include('config.php');
session_start();
error_reporting(0);
?>

<?php
if(strlen($_SESSION['alogin'])==0)
{	
	header('location:index.php');
}
else
{
	if(isset($_REQUEST['eid']))
	{
		$eid=intval($_GET['eid']);
		$sql = "CALL cancel_booking('$eid')";
		$result= mysqli_query($dbh,$sql);
		if($result)
			$msg = 'Booking Succesfully Cancelled';
		else 
		{
			$error="Something went wrong. Please try again";
		}
	}

	if(isset($_REQUEST['aeid']))
	{
		$aeid=intval($_GET['aeid']);
		$sql = "CALL accept_booking('$aeid')";
		$result = mysqli_query($dbh,$sql);
		if($result)
			$msg="Booking Successfully Confirmed";
		else 
		{
			$error="Something went wrong. Please try again";
		}
	}
 ?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Car Rental Portal |Admin Manage testimonials   </title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="assets/css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="assets/css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="assets/css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="assets/css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="assets/css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="assets/css/style.css">
  <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>

</head>

<body>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Manage Bookings</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Bookings Info</div>
							<div class="panel-body">
							<?php if($error)
								  { ?>
							 		<div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div>
	  					    <?php } 
								  else if($msg)
								  {?>
	  							  	<div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div>
							<?php }?>					
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>ID</th>
											<th>Name</th>
											<th>Vehicle</th>
											<th>From Date</th>
											<th>To Date</th>
											<th>Status</th>
											<th>Posting date</th>
											<th>Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>ID</th>
											<th>Name</th>
											<th>Vehicle</th>
											<th>From Date</th>
											<th>To Date</th>
											<th>Status</th>
											<th>Posting date</th>
											<th>Action</th>
										</tr>
									</tfoot>
									<tbody>

									<?php $sql = "SELECT bookingid,username,name,from_date,to_date,position,posting_date from booking_details join vehicle_data on vehicle_ID=vehicleID join user_table on email=email_id;";
										  $results= mysqli_query($dbh,$sql);
										  $query_count=mysqli_num_rows($results);
										  $cnt=1;
										  if($query_count > 0)
										 {
												while($row = mysqli_fetch_array($results))  
											{
											?>	
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($row['username']);?></td>
											<td> <?php echo htmlentities($row['name']);?></td>
											<td><?php echo htmlentities($row['from_date']);?></td>
											<td><?php echo htmlentities($row['to_date']);?></td>
											<td><?php echo htmlentities($row['position']);?></td>
											<td><?php echo htmlentities($row['posting_date']);?></td>
										<td><a href="manage-bookings.php?aeid=<?php echo htmlentities($row['bookingid']);?>" onclick="return confirm('Do you really want to Confirm this booking')"> Confirm</a> /
											<a href="manage-bookings.php?eid=<?php echo htmlentities($row['bookingid']);?>" onclick="return confirm('Do you really want to Cancel this Booking')"> Cancel</a>
										</td>

										</tr>
										<?php $cnt=$cnt+1; 
											}
										} ?>
										
									</tbody>
								</table>
							</div>
						</div>

					

					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
<?php } ?>
