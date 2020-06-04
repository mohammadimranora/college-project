<?php
	require 'connect.php';
	session_start();
	if (!isset($_SESSION['userid'])) {
		header('location: index.php');
	}
	$pic=$_SESSION["UserData"]["pic"];
	$urdu=$level=$sports=$errorMsg="";
	if (isset($_POST['savenext'])) {
		
		$urdu=$_POST['Urdu'];
		$level=$_POST['level'];
		$sports=$_POST['sports'];

		if ($urdu!="" && $level!="" && $sports!="") {
			
			$SqlInsert="INSERT INTO `studiedurduandsports`(`sid`, `isstudiedurdu`, `levelofstudy`, `issportsperson`) VALUES ('$_SESSION[userid]','$urdu','$level','$sports')";
			$Status=mysqli_query($con,$SqlInsert);

			if ($Status==1) {
				header('location: counsellstage6.php');
			}
			else
			{
				$errorMsg="Data haven't been saved";
			}
		}
		else
		{
			echo "<script>alert('Please select all required value');</script>";
		}
	}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  		<title> Urdu and Sports Details | OCS</title>
 		<meta name="viewport" content="width=device-width, initial-scale=1">
 		<link rel="stylesheet" href="./index_files/bootstrap.min.css">
 		<link rel="stylesheet" href="./index_files/custom.css">
 		<script src="./index_files/jquery.min.js.download"></script>
 		<script src="./index_files/bootstrap.min.js.download"></script>	
 		<link rel="stylesheet" type="text/css" href="./index_files/custom1.css">
 		<script type="text/javascript" src="./index_files/urdu.js"></script>
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
				<li class=""><a href=" ">Hi...<?php echo $_SESSION['username'];?></a></li>
				<li class=""><a href="logout.php">Logout</a></li>
				
			</ul>
		</div>
	</div>
</nav>
<div class="container MainContainer">
	<div class="row">
		<div class="col-sm-3 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading">Dashboard</div>
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
				<div class="panel-heading"> Choice Selection - Step 5-1</div>
				<div class="panel-body">
					<form action="" class="form-horizontal" method="post" accept-charset="utf-8">
						<div class="form-group">
  							<div class="col-sm-12">
  								<label>Have you studied Urdu<span style="color: red; font-weight: bold;">*</span></label><br>
  								<label>Yes</label>&nbsp<input type="radio" name="Urdu" value="Yes">&nbsp
  								<label>No</label>&nbsp<input type="radio" name="Urdu" value="No">
  							</div>
  						</div>
  						<div class="form-group">
  							<div class="col-sm-12">
  								<select class="form-control" name="level" id="type1" required="">
  									<option value="">--Select Level of Study Urdu--</option>
  									<option value="Matriculation">Matriculation</option>
  									<option value="Intermediate">Intermediate</option>  									
  								</select>
  							</div>
  						</div>
						<div class="form-group">
  							<div class="col-sm-12">
  								<label>Are you a Sports Person<span style="color: red; font-weight: bold;">*</span></label><br>
  								<label>Yes</label>&nbsp<input type="radio" name="sports" value="Yes">&nbsp
  								<label>No</label>&nbsp<input type="radio" name="sports" value="No">
  							</div>
  						</div>
  						<div class="form-group">
  							<div class="col-xs-12 col-sm-10">
  								<button type="submit" class="btn btn-primary" name="savenext" onclick="urduValidate()">Save & Next</button>
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