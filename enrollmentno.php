<?php
	require 'connect.php';
	session_start();
	if(!isset($_SESSION['adminid']))
	{
		header('location:logout.php');
	}
	$sid=$msg="";
	if (isset($_POST['generate'])) {
		$sid=$_POST['sid'];
		$checkgen="SELECT `eno`,sid FROM `admission` WHERE sid='$sid'";
		$result=mysqli_query($con,$checkgen);
		$count=mysqli_num_rows($result);
		$row=mysqli_fetch_array($result);
		if ($row[1]=="" && $row[1]==null) {
			$msg="May be, Admission hasn't been confirmed";
		}
		else
		{
			if ($count==1 && $row[0]!="") {
				$msg="Enrollemt Number has been already generated";
			}
			else
			{
				$enrollmentno=generate_no();
				$update="UPDATE `admission` SET `eno`='$enrollmentno' WHERE sid='$sid'";
				$status=mysqli_query($con,$update);
				if ($status==1) {
					$msg="Enrollment number has been generated. Here is Enrollment number $enrollmentno";
				}
				else
				{
					$enrollmentno1=generate_no();
					$updat1="UPDATE `admission` SET `eno`='$enrollmentno1' WHERE sid='$sid'";
					$status1=mysqli_query($con,$update1);
					if ($status1==1) {
						$msg="Enrollment number has been generated. Here is Enrollment number $enrollmentno1";
					}
				}
			}
		}
	}
	function generate_no()
	{
		$year=date('y');
		$num=mt_rand(1111,9999);
		$addAyear='A'.$year;
		$eno=$addAyear.$num;
		return $eno;
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  		<title> Enrollment No Generation | OCS</title>
 		<meta name="viewport" content="width=device-width, initial-scale=1">
 		<link rel="stylesheet" href="./index_files/bootstrap.min.css">
 		<link rel="stylesheet" href="./index_files/custom.css">
 		<script src="./index_files/jquery.min.js.download"></script>
 		<script src="./index_files/bootstrap.min.js.download"></script>	
 		<link rel="stylesheet" type="text/css" href="./index_files/custom1.css">
 		<script type="text/javascript">
 			function enrollValid()
 			{
 				var sid=document.getElementById("sid").value;
 				if (sid=="" || sid==null) {
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
						<li><a href="verify.php">Verify Document</a></li>
						<li class="active"><a href="enrollmentno.php">Generate Enrollment No</a></li>
						<li><a href="stats.php">Generate Stats</a></li>
						<li><a href="search.php">Search Student</a></li>
						<li><a href="report.php" target="_blank">Generate Report</a></li>
						<li><a href="enablepay.php">Enable Payment</a></li>
						<li><a href="cacchangepassword.php">Change Password</a></li>
						<li><a href="logout.php">Logout</a></li>        
					</ul>
				</div>				
			</div>
			
		</div>
		<div class="col-sm-6 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading">Generate Enrollment Number</div>
				<div class="panel-body">
					<span style="color: green; font-weight: bold;"><?php echo $msg;?></span>
					<form action="" class="form-horizontal" method="post" accept-charset="utf-8">
  						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" class="form-control" id="sid" placeholder="Enter Student ID" required name="sid" autocomplete="off">
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-sm-6 col-sm-7">
								<button type="submit" class="btn btn-primary" name="generate" onclick="enrollValid()">Generate Enroll No.</button>
								<button type="reset" class="btn btn-primary"> Clear</button>
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

</style>
</body></html>