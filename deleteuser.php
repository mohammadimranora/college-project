<?php
	require 'connect.php';
	session_start();
	if(!isset($_SESSION['adminid']))
	{
		header('location:logout.php');
	}
	$userid=$type=$errorMsg=$sucessMsg="";
	$isData=0;
	if (isset($_POST['fetchdata'])) {
		$userid=$_POST['userid'];
		$type=$_POST['type'];
		$sqlcheck="select *from user where user_id='$userid' AND type='$type'";
		$result=mysqli_query($con,$sqlcheck);
		$row=mysqli_fetch_array($result);
		if (mysqli_num_rows($result)>0) {
			$isData=1;
			$_SESSION['isData']=$isData;
		}
		else
		{
				$errorMsg="Invalid User";
		}
	}
	if (isset($_POST['delete'])) {
		$userid=$_POST['userid'];
		$type=$_POST['type'];
		if ($_SESSION['isData']==1) {			
			$delete="DELETE FROM `user` WHERE user_id='$userid' AND type='$type'";
			$status=mysqli_query($con,$delete);
			if ($status==1) {
				$sucessMsg="User was deleted";
				$_SESSION['isData']=0;
			}
			else
			{
				$errorMsg="User hasn't been deleted";
			}
		}
		else
		{
			$errorMsg="User isn't valid";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  		<title> Delete User | OCS</title>
 		<meta name="viewport" content="width=device-width, initial-scale=1">
 		<link rel="stylesheet" href="./index_files/bootstrap.min.css">
 		<link rel="stylesheet" href="./index_files/custom.css">
 		<script src="./index_files/jquery.min.js.download"></script>
 		<script src="./index_files/bootstrap.min.js.download"></script>	
 		<link rel="stylesheet" type="text/css" href="./index_files/custom1.css">
 		<script type="text/javascript" src="./index_files/deleteuser.js"></script>
 	</head>
<body>
<div>
	<div class="container">
  		<div class="row">
  			<div class="col-md-2 col-xs-12"> 
  				<a href="adminindex.php">
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
						Dashboard- Admin					
				</div>
				<div class="panel-body">
					<div class="msgimg">
						<img src="./index_files/img_avatar.png" style=" width: 100px;">
						
					</div >
					<ul class="nav nav-pills nav-stacked" role="tablist" style="padding-top: 10px; display: block;">
						<li><a href="adminindex.php">Home</a></li>
						<li><a href="createuser.php">Create User</a></li>
						<li><a href="updateuser.php">Update User</a></li>
						<li class="active"><a href="deleteuser.php">Delete User</a></li>
						<li><a href="grievanceprint.php">Grievance</a></li>
						<li><a href="complaintprint.php">Complaint</a></li>
						<li><a href="openadmission.php">Open Admission</a></li>
						<li><a href="closeadmission.php">Close Admission</a></li>
						<li><a href="adminchangepassword.php">Change Password</a></li>
						<li><a href="logout.php">Logout</a></li>        
					</ul>
				</div>				
			</div>
			
		</div>
		<div class="col-sm-6 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading">Delete User</div>
				<div class="panel-body">
					<span style="color: red; font-weight: bold; text-transform: capitalize;"><?php echo $errorMsg;?></span>
					<span style="color: green; font-weight: bold; text-transform: capitalize;"><?php echo $sucessMsg;?></span>
					<form action="" class="form-horizontal" method="post" accept-charset="utf-8">
  								<div class="form-group">
  									<div class="col-sm-12">
  										<input type="text" value="" id="userid" class="form-control" required="" name="userid" placeholder="User ID">
  									</div>
  								</div>
  								<div class="form-group">
  									<div class="col-sm-12">
  										<select class="form-control" id="type" name="type" required="">
  											<option value="">--Select Account Type--</option>
  											<option value="dac">DAC</option>
  											<option value="cac">CAC</option>
  											<option value="admin">Admin</option>
  										</select>
  									</div>
  								</div>
								<br>
  								<div class="form-group">
  									<div class="col-xs-12 col-sm-10">
  										<button type="submit" class="btn btn-primary" name="fetchdata" onclick="deleteuserValid()">Get Details</button>
  										<button type="submit" class="btn btn-primary" name="delete" onclick="deleteuserValid()">Delete</button>
  										<button type="reset" class="btn btn-primary">Clear</button>
  									</div>
  								</div>
  							</form>
  							<div class="panel panel-primary">
  								<div class="panel-body" style="color: green; font-weight: bold; text-transform: uppercase;">
  									<?php
  								if ($isData==1) {

  									echo "User ID : $row[0] &nbsp Name : $row[1]<br><br>E-Mail : $row[3] &nbsp Mobile No : $row[4]<br><br>Type : $row[5]"; 									
  								}

  							?>
  									
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