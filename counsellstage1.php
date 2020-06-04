<?php
	require 'connect.php';
	session_start();
	if(!isset($_SESSION['userid']))
	{
		header('location:index.php');
	}
	$pic=$_SESSION["UserData"]["pic"];
	
	$msg=$name=$id=$course=$category=$rank="";
	$id=$_SESSION["userid"];

	$sql="select *from student_info where sid='$id'";
	$result=mysqli_query($con,$sql);
	$row=mysqli_fetch_assoc($result);

	$name=$row["name"];
	$id=$row["sid"];
	
	$course=$row["courseid"];
	$category=$row["category"];
	$rank=$row["rank_scored"];
	$_SESSION['courseid']=$course;

	$sqlstchk="select * FROM `counsell_status` where sid='$id'";
	$result1=mysqli_query($con,$sqlstchk);
	$row_num=mysqli_num_rows($result1);

	if ($row_num==1) {

		$msg="You have already applied for Counselling, need not to submit data again. Thank You. Wish you for your bright future.";
	}
	else{
		if (isset($_POST['procced'])) {
			
			header('location: counsellstage2.php');
		}

	}
	mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  		<title> Partial Details | OCS</title>
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
				<li class=""><a href="index.php">Hi...<?php echo $_SESSION['username']?></a></li>
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
						<li class="active"><a href="counsellstage1.php">Apply for Counselling</a></li>
						<li><a href="checkstatus.php">Check Status</a></li>
						<li><a href="feesubmission.php">Fee Submission</a></li>
						<li><a href="changepassword.php">Change Password</a></li>
						<li><a href="logout.php">Logout</a></li>        
					</ul>
				</div>				
			</div>
		</div>
		<div class="col-sm-6 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading"> Partial Details - Step 1</div>
				<div class="panel-body">
					<form action="" class="form-horizontal" method="post" accept-charset="utf-8">
  								<div class="form-group">
  									<div class="col-sm-12">
  										<input type="text" class="form-control" name="name" readonly="" value="<?php echo $name; ?>">
  									</div>
  								</div>
  								<div class="form-group">
  									<div class="col-sm-12">
  										<input type="text" class="form-control" name="id" readonly="" value="<?php echo $id; ?>">
  									</div>
  								</div>
  								<div class="form-group">
  									<div class="col-sm-12">
  										<input type="text" class="form-control" name="course" readonly="" value="<?php echo $course; ?>">
  									</div>
  								</div>
  								<div class="form-group">
  									<div class="col-sm-12">
  										<input type="text" class="form-control" name="category" readonly="" value="<?php echo $category; ?>">
  									</div>
  								</div>
  								<div class="form-group">
  									<div class="col-sm-12">
  										<input type="text" class="form-control" name="rank" readonly="" value="<?php echo $rank; ?>">
  									</div>
  								</div>
  								
  								<br>
  								<div class="form-group">
  									<div class="col-sm-1 col-sm-10">
  										<button type="submit" class="btn btn-primary" name="procced">Procced</button>
  									</div>
  								</div>
  							</form>
					
				</div>
				
				<div style="padding-left: 15px;padding-right: 15px; color: red; font-weight: bold;"><span ><?php echo $msg; ?></span></div>
				
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