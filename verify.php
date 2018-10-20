<?php
	require 'connect.php';
	session_start();
	if(!isset($_SESSION['adminid']))
	{
		header('location:logout.php');
	}
	$msg="";
	if (isset($_POST['verify'])) {
		
		$sid=$_POST['sid'];
		$queries="SELECT sid FROM `student_info` WHERE sid='$sid'";
		$result=mysqli_query($con,$queries);

		$queries1="SELECT `sid` FROM `counsell_status` WHERE sid='$sid'";
		$resultnow=mysqli_query($con,$queries1);


		if (mysqli_num_rows($result)>0) {
			
			if (mysqli_num_rows($resultnow)>0) {
				
				$queries1="SELECT *FROM `student_info` WHERE sid='$sid'";
				$result1=mysqli_query($con,$queries1);
				$row=mysqli_fetch_assoc($result1);
				$_SESSION['DataUser']=$row;

				echo "<script>window.open('docbundle.php')</script>";
			}
			else
			{
				$msg="Student has not uploaded documents";
			}
		}
		else
		{
			$msg="Invalid Student ID";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  		<title> Verify Documents | OCS</title>
 		<meta name="viewport" content="width=device-width, initial-scale=1">
 		<link rel="stylesheet" href="./index_files/bootstrap.min.css">
 		<link rel="stylesheet" href="./index_files/custom.css">
 		<script src="./index_files/jquery.min.js.download"></script>
 		<script src="./index_files/bootstrap.min.js.download"></script>	
 		<link rel="stylesheet" type="text/css" href="./index_files/custom1.css">
 		<script type="text/javascript">
 			function verifyValid()
 			{
 				var stid=document.getElementById("sid").value;
 				if (stid=="" || stid==null) {
 					alert("Please Enter Student ID");
 					sid.focus();
 					return false;
 				}
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
		<div class="col-sm-3 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
						Dashboard- CAC					
				</div>
				<div class="panel-body">
					<div class="msgimg">
						<img src="./index_files/img_avatar.png" style=" width: 100px;">
					</div >
					<ul class="nav nav-pills nav-stacked" role="tablist" style="padding-top: 10px; display: block;">
						<li><a href="cacindex.php">Home</a></li>
						<li><a href="allotment.php">Allot Seat & Center</a></li>
						<li class="active"><a href="verify.php">Verify Document</a></li>
						<li><a href="enrollmentno.php">Generate Enrollment No</a></li>
						<li><a href="stats.php">Generate Stats</a></li>
						<li><a href="search.php">Search Student</a></li>
						<li><a href="report.php" target="_blanck">Generate Report</a></li>
						<li><a href="enablepay.php">Enable Payment</a></li>
						<li><a href="cacchangepassword.php">Change Password</a></li>
						<li><a href="logout.php">Logout</a></li>        
					</ul>
				</div>				
			</div>
			
		</div>
		<div class="col-sm-6 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading">Verify Documents</div>
				<div class="panel-body">
					<span style="font-weight: bold; color: green;"><?php echo $msg;?></span>
					<form action="" class="form-horizontal" method="post" accept-charset="utf-8">
  						<div class="form-group">
  							<div class="col-sm-12">
  								<input type="text" name="sid" id="sid" required autofocus="on" class="form-control" placeholder="Please enter Student ID" autocomplete="off">
  							</div>
  						</div>
  						<br>
  						<div class="form-group">
  							<div class="col-xs-12 col-sm-10">
  								<button type="submit" class="btn btn-primary" name="verify" onclick="verifyValid()">Verify Documents</button>
  								<button type="reset" class="btn btn-primary">Clear</button>
  							</div>
  						</div>
  					</form>
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