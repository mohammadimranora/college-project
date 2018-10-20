<?php
	require 'connect.php';
	$status=$sucess=$msg="";
	if (isset($_POST['submit'])) {

		$fname=$_POST['Fullname'];
		$email=$_POST['email'];
		$mobile=$_POST['mobile'];
		$ptype=$_POST['type'];
		$description=$_POST['description'];

		$sqlInsert="INSERT INTO `support`(`name`, `email`, `mobile`, `type`, `description`) VALUES ('$fname','$email','$mobile','$ptype','$description')";
		
		$sucess=mysqli_query($con,$sqlInsert);

		if ($sucess==1) {
			$status="Your query for Help and Support has been submitted. We'll get back to you soon.";
			$msg="Complaint Reference No: CP$mobile";


		}
		
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  		<title>Support | OCS</title>
 		<meta name="viewport" content="width=device-width, initial-scale=1">
 		<link rel="stylesheet" href="./index_files/bootstrap.min.css">
 		<link rel="stylesheet" href="./index_files/custom.css">
 		<script src="./index_files/jquery.min.js.download"></script>
 		<script src="./index_files/bootstrap.min.js.download"></script>	
 		<link rel="stylesheet" type="text/css" href="./index_files/custom1.css">
 		<script type="text/javascript" src="./index_files/help.js"></script>
 	</head>
<body>

<div>
	<div class="container">
  		<div class="row">
  			<div class="col-md-2 col-xs-12"> 
  				<a href="index.php">
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
  			<ul class="headerNav nav navbar-nav ">
  				<li class=""><a href="index.php">Home</a></li> 
  				<li class=""><a href="grievance.php">Grievance for counselling</a></li>
				<li class=""><a href="flowchart.php">Flowchart for Counselling</a></li>
				<li class=""><a href="msgcac.php"> Message </a></li>
				<li class=""><a href="help.php">Need Help?</a></li>
			</ul>
			<ul class="headerNav nav navbar-nav " style=" float: right;">
				
			</ul>
		</div>
	</div>
</nav>
<div class="container MainContainer">
	<div class="row">
		<div class="col-sm-3">
			
		</div>
		<div class="col-sm-6">
			<div class="panel panel-primary">
				<div class="panel-heading">Support</div>
					<div class="panel-body">
						<span style="color: green; font-weight: bold;"><?php echo $status; echo $msg;?></span>
						<form action=" " class="form-horizontal" method="post" accept-charset="utf-8">
	  								<div class="form-group">
								<div class="col-sm-12">
									<input type="text"  value="" id="name" required class="form-control"   placeholder="Enter Full Name"  name="Fullname" style="text-transform: capitalize;" autocomplete="off">
								</div>
							</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="email" value="" class="form-control" id="email" placeholder="Enter Your Email" required name="email" style="text-transform: lowercase;" autocomplete="off">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" value="" class="form-control" id="mobile" placeholder="Enter Your Mobile" required name="mobile" autocomplete="off">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<select class="form-control"  name="type" required id="type" >
									<option value=''>--Select Problem Type--</option>
									<option value='Query' >Query</option>
									<option value='Technical' >Technical</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<textarea class="form-control" id="des" placeholder="Enter Problem Description" required name="description" autocomplete="off"></textarea>
							</div>
						</div>
						<!--<div class="form-group">
						
							<div class="col-sm-12">
								<p>Attachment, If any.</p>
								<input type="file" class="form-control"  placeholder="Select"  name="Attachment">
			
							</div>
						</div>-->
						<div class="form-group">
							<div class="col-sm-5 col-sm-7">
								<button type="submit" class="btn btn-primary" name="submit" onclick="helpValidate()">Submit</button>
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
</style>
</body></html>