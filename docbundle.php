<?php
	require 'connect.php';
	session_start();
	if(!isset($_SESSION['adminid']))
	{
		header('location:logout.php');
	}
	$resi=$_SESSION['DataUser']['residential_cert'];
	$caste=$_SESSION['DataUser']['caste_cert'];
	$income=$_SESSION['DataUser']['income_cert'];
	$memo=$_SESSION['DataUser']['last_exam_marksmemo'];
	$adhar=$_SESSION['DataUser']['adhar'];
	$lcert=$_SESSION['DataUser']['leaving_cert'];
	$sid=$_SESSION['DataUser']['sid'];
	$msg="";
	if (isset($_POST['verified'])) {
		
		$queries="INSERT INTO `documents`(`sid`, `isverified`) VALUES ('$sid','1')";
		$status=mysqli_query($con,$queries);

		if ($status==1) {
			$msg="Documents Verified Successfully";
		}
		else
		{
			$msg="Documents Not Verified Successfully";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  		<title> Documents Bundle | OCS</title>
 		<meta name="viewport" content="width=device-width, initial-scale=1">
 		<link rel="stylesheet" href="./index_files/bootstrap.min.css">
 		<link rel="stylesheet" href="./index_files/custom.css">
 		<script src="./index_files/jquery.min.js.download"></script>
 		<script src="./index_files/bootstrap.min.js.download"></script>	
 		<link rel="stylesheet" type="text/css" href="./index_files/custom1.css">
 		<script type="text/javascript">
 			function closeMe()
			{
			    window.opener = self;
			    window.close();
			}
 		</script>
 	</head>
<body>
<div>
	<div class="container">
  		<div class="row">
  			<div class="col-md-2 col-xs-12"> 
  				<a href="cacindex.php">
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
		<div class="col-sm-2">
			
		</div>
		<div class="col-md-8 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading">Documents</div>
				<span style="color: green; font-weight: bold;"><?php echo $msg;?></span>
					<div class="panel-body">
						<button class="btn btn-success"><a href="<?php echo $resi;?>" target="_blank">Residentail<br>Certificate</a></button>
						<button class="btn btn-success"><a href="<?php echo $caste;?>" target="_blank">Caste<br>Certificate</a></button>
						<button class="btn btn-success"><a href="<?php echo $income;?>" target="_blank">Income<br>Certificate</a></button>
						<button class="btn btn-success"><a href="<?php echo $memo;?>" target="_blank">Last Exam<br>Memo</a></button>
						<button class="btn btn-success"><a href="<?php echo $adhar;?>" target="_blank">Adhar<br>Card</a></button>
						<button class="btn btn-success"><a href="<?php echo $lcert;?>" target="_blank">Leaving<br>Certificate</a></button>	
					</div>
				</div>
				<form action="" method="post" class="form-horizontal">
					<div class="form-group">
						<div class="col-sm-12">
							<input type="submit" name="verified" class="btn btn-primary" value="Verified">
							<button class="btn btn-primary" onclick="closeMe()">Close this Window</button>

						</div>
						
					</div>
					
				</form>
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
.btn-success a
{
	text-decoration: none;
	color: white;
}
</style>
</body></html>