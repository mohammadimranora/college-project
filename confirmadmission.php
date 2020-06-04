<?php
	session_start();
	if(!isset($_SESSION['adminid']))
	{
		header('location:logout.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  		<title> Confirm Admission | OCS</title>
 		<meta name="viewport" content="width=device-width, initial-scale=1">
 		<link rel="stylesheet" href="./index_files/bootstrap.min.css">
 		<link rel="stylesheet" href="./index_files/custom.css">
 		<script src="./index_files/jquery.min.js.download"></script>
 		<script src="./index_files/bootstrap.min.js.download"></script>	
 		<link rel="stylesheet" type="text/css" href="./index_files/custom1.css">
 		<script type="text/javascript" src="./index_files/cnfaddmission.js"></script>
 	</head>
<body>

<div>
	<div class="container">
  		<div class="row">
  			<div class="col-md-2 col-xs-12"> 
  				<a href="dacindex.php">
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
				<li class=""><a>Hi...<?php echo $_SESSION['username'];?></a></li>
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
						Dashboard- DAC					
				</div>
				<div class="panel-body">
					<div class="msgimg">
						<img src="./index_files/img_avatar.png" style=" width: 100px;">
						
					</div >
					<ul class="nav nav-pills nav-stacked" role="tablist" style="padding-top: 10px; display: block;">
						<li><a href="dacindex.php">Home</a></li>
						<li><a href="AddCourse.php">Create Course</a></li>
						<li><a href="updatecourse.php">Update Course</a></li>
						<li><a href="deletecourse.php">Delete Course</a></li>
						<li class="active"><a href="confirmadmission.php">Confirm Admission</a></li>
						<li><a href="generateadmissionletter.php">Generate Admission Letter</a></li>
						<li><a href="dacchangepassword.php">Change Password</a></li>
						<li><a href="logout.php">Logout</a></li>        
					</ul>
				</div>				
			</div>
			
		</div>
		<div class="col-sm-7 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading">Confirm Admission</div>
				<div class="panel-body">
					<form action="" class="form-horizontal" method="post" accept-charset="utf-8">
  								<div class="form-group">
  									<div class="col-sm-12">
  										<input type="text" name="sid" id="sid" class="form-control" placeholder="Student Id" required="" style="text-transform: uppercase;">
  									</div>
  								</div>
  								<div class="form-group">
  									<div class="col-xs-12 col-sm-10">
  										<button type="submit" class="btn btn-primary" name="confirm" onclick="cnfAdmissionValid()">Confirm Admission</button>
  										<button type="reset" class="btn btn-primary">Clear</button>
  									</div>
  								</div>
  							</form>
  							<div class="panel panel-primary">
  								<div class="panel-heading">Details Here</div>
  									<div class="panel-body">
  										<span style="color: green; font-weight: bold; text-transform: uppercase;">
  										<?php
  												require 'connect.php';
  												$sid=$msg="";
												if (isset($_POST['confirm'])) {
													
													$sid=$_POST['sid'];

													$checkStatus1="SELECT sid from counsell_status where sid='$sid'";
													$checkStatus2="SELECT sid,payment_enable from allotment where sid='$sid'";
													$checkStatus3="SELECT sid,payment_status from payment_info where sid='$sid'";

													$result1=mysqli_query($con,$checkStatus1);
													$dataDB1=mysqli_fetch_array($result1);

													$result2=mysqli_query($con,$checkStatus2);
													$dataDB2=mysqli_fetch_array($result2);

													$result3=mysqli_query($con,$checkStatus3);
													$dataDB3=mysqli_fetch_array($result3);

													if ($dataDB1[0]==null) {
														
														echo "Student hasn't submitted counselling application";
													}
													else
													{
														if ($dataDB2[0]==null) {
															
															echo "Center and Course hasn't been alloted.";
														}
														else
														{
															if ($dataDB2[1]==0) {
																
																echo "Payment wasn't activated. Please contact Central Admission Cell.";
															}
															else
															{
																if ($dataDB3[0]==null && $dataDB3[1]==0) {
																
																	echo "Payment hasn't been done. Kindly pay the Admission Fee. ";
																}
																else
																{
																	$selectData="SELECT `center_alloted`, `course_alloted` FROM `allotment` WHERE sid='$sid'";

																	$takeData=mysqli_query($con,$selectData);
																	$dataDB4=mysqli_fetch_array($takeData);

																	$insertData="INSERT INTO `admission`(`sid`,`center`, `course`) VALUES ('$sid','$dataDB4[0]','$dataDB4[1]');";

																	$status=mysqli_query($con,$insertData);


																	if ($status==1) {
																		
																		echo "Admission has been confirmed.";
																	}
																	else
																	{
																		echo "Admission has not been confirmed";
																	}
																}
															}
														}
													}


												}
											?>
  										</span>
  									</div>
  							</div>
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
.btn-success
{
	height: 150px;
	border-radius: 5%;
	width: 200px;
	padding-top: 10px;
	font-size: 20px;
	font-weight: bold;
}
</style>
</body></html>