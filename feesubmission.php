<?php
	require 'connect.php';
	session_start();
	if (!isset($_SESSION['userid'])) {
		header('location: index.php');
	}
	$pic=$_SESSION["UserData"]["pic"];
	$payment_enable=$payment_status=$paystatus=$fee="";
	$sql2="select fee from course_info where course_id='$_SESSION[courseid]'";
	$result2=mysqli_query($con,$sql2);
	$row2=mysqli_fetch_assoc($result2);
	$fee=$row2["fee"];
	if (isset($_POST['pay'])) {
		
		$sql="select payment_enable from allotment where sid='$_SESSION[userid]'";
		$sql1="select payment_status from payment_info where sid='$_SESSION[userid]'";
		
		$result=mysqli_query($con,$sql);
		$result1=mysqli_query($con,$sql1);
		

		$row=mysqli_fetch_assoc($result);
		$row1=mysqli_fetch_assoc($result1);
		

		
		$payment_enable=$row["payment_enable"];
		$payment_status=$row1["payment_status"];

		if ($payment_enable=='1') {
			
			if ($payment_status==NULL) {

				header('location: https://www.instamojo.com/@imrance07');
				
			}
			else{
				$paystatus="You have already paid the fee.";
			}
		}
		else{
			$paystatus="Your Payment option has not been activated. Contact Central Admission Cell.";
		}


	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  		<title> Fee Submission | OCS</title>
 		<meta name="viewport" content="width=device-width, initial-scale=1">
 		<link rel="stylesheet" href="./index_files/bootstrap.min.css">
 		<link rel="stylesheet" href="./index_files/custom.css">
 		<script src="./index_files/jquery.min.js.download"></script>
 		<script src="./index_files/bootstrap.min.js.download"></script>	
 		<link rel="stylesheet" type="text/css" href="./index_files/custom1.css">
 	</head>
<body>

<div>
	<div class="container">
  		<div class="row">
  			<div class="col-md-2 col-xs-12"> 
  				<a href="userindex.php">
  					<img src="./index_files/ocslogo.png" class="img-responsive classLogo"></a>
			</div>
 
			<div class="col-md-7 col-xs-12" style="padding-top: 8px;color: #4444a9;"> 
 				<div class="col-md-7 col-xs-12 hidden-xs">
 					<span style="
				    font-size: 20px;
				    font-weight: bold;
				    line-height: 45px; color: #5f4c4c;">
					ऑनलाइन काउंसलिंग सिस्टम</span>
				</div>
				<div class="col-md-5 col-xs-12">

				<span class="UrduText" style=" font-size: 20px;font-weight: bold;text-align:right; color: #5f4c4c">
				آن لائن کوسللنگ سسٹم </span>

				</div>
				<br>
				<div class="col-md-12 col-xs-12 ">

				<span class="MANUUEngText" style="color: #5f4c4c;">Online Counselling System </span>
				</div>
			</div>
			<div class="col-md-3 hidden-xs" style="color: #5f4c4c;text-align: right;font-weight: bold;">
				<br>Call Us : +91-9160659149
				<br>Mail Us : queries@ocs.com
			</div>
		</div>
	</div>
</div>

<nav class="navbar navbar-default" role="navigation" style="background: #5f4c4c;">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
    	</button>    
    </div>
  	<div class="navbar-collapse collapse">
  		<div class="container">
			<ul class="headerNav nav navbar-nav " style=" float: right;">
				<li class=""><a href="">Hi...<?php echo $_SESSION['username'];?></a></li>
				<li class=""><a href="logout.php">Logout</a></li>
				
			</ul>
		</div>
	</div>
</nav>
<div class="container MainContainer">
	<div class="row">
		<div class="col-sm-3 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
						Dashboard					
				</div>
				<div class="panel-body">
					<div class="msgimg">
						<?php if(!$pic) {  ?>
			            <img src="./index_files/img_avatar.png" style=" width: 100px;">
			            <?php } else {  ?>
			            <img src="<?php echo $pic;?>" style=" width: 100px;">
			            <?php } ?>
						
					</div >
					<ul class="nav nav-pills nav-stacked" role="tablist" style="padding-top: 10px;">
						<li><a href="userindex.php">Home</a></li>
						<li><a href="counsellstage1.php">Apply for Counselling</a></li>
						<li><a href="checkstatus.php">Check Status</a></li>
						<li class="active"><a href="feesubmission.php">Fee Submission</a></li>
						<li><a href="changepassword.php">Change Password</a></li>
						<li><a href="logout.php">Logout</a></li>        
					</ul>
				</div>				
			</div>
		</div>
		<div class="col-sm-6 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading"> Fee Submission</div>
				<div class="panel-body">
					<form action="" class="form-horizontal" method="post" accept-charset="utf-8">
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" value="<?php echo $_SESSION['userid'];?>" class="form-control"  placeholder="Temp ID" readonly="" name="id">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" value="<?php echo $_SESSION['username'];?>" readonly="" class="form-control"  placeholder="Name" name="name">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" value="<?php echo $_SESSION['courseid'];?>" readonly="" class="form-control"  placeholder="Course" name="course">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="number" value="<?php echo $fee;?>" readonly="" class="form-control"  placeholder="Fee Amount" name="famount">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-5 col-sm-7">
								<button type="submit" name="pay" class="btn btn-primary">Pay</a></button>
							</div>
						</div>
  					</form>
					<span style="color: red; font-weight: bold;"><?php echo $paystatus;?></span>
				</div>
				
			</div>
			
		</div>
	</div>
</div>
<footer class="container-fluid navbar-static text-center" style="background-color: #5f4c4c;">
	<p style="margin: 10px 0 10px;">Designed and Developed by Mohammad & Team, Under guidence of Dr. Muqeem Ahmed</p>
</footer>
<style>

footer 
{
	    background: #4267b2;
		padding:0 !important;
		color:white;
}
@media (min-width: 768px) {
  .navbar-nav.navbar-center {
    position: absolute;
    left: 50%;
    transform: translatex(-50%);
  }
}

.comp
{
	color:red;
}
.navbar
{
	    margin-bottom: 15px;
}
</style>
<style>
.nav-tabs >.active > a{
	    background-color: white !important;
		    color: #05589e !important;
}
.msgimg img
{
	display: block;
    margin-left: auto;
    margin-right: auto;
    width: 50%;
    border-radius: 50%;
}
</style>
</body></html>