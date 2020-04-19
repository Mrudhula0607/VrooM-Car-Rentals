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
	if(isset($_POST['submit']))
	{
		$brand=$_POST['brand'];
		$new_brand = "CALL create_brand('$brand')";
		$result=mysqli_query($dbh,$new_brand);
		if($result)
		{
			$msg="Brand Created successfully";
		}
		else 
		{
			$error="Something went wrong. Please try again";
		}	
	}
?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	
	<title>Admin Create Brand</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="assets/css/dataTables.bootstrap.min.css">
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
					
						<h2 class="page-title">Create Brand</h2>

						<div class="row">
							<div class="col-md-10">
								<div class="panel panel-default">
									<div class="panel-heading">Form fields</div>
									<div class="panel-body">
										<form method="post"  class="form-horizontal" onSubmit="return valid();">
											<?php if($error)
												  { ?>
													<div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div>
											<?php } 
												  else if($msg)
												  {?>
												  	<div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div>
											<?php }?>
											<div class="form-group">
												<label class="col-sm-4 control-label">Brand Name</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="brand" id="brand" required>
												</div>
											</div>
											<div class="hr-dashed"></div>
												<div class="form-group">
													<div class="col-sm-8 col-sm-offset-4">
														<button class="btn btn-primary" name="submit" type="submit">Submit</button>
													</div>
												</div>
										</form>
											</div>
									</div>
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