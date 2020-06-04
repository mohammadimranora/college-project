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
  		<title> Grievance Panel | OCS</title>
 		<meta name="viewport" content="width=device-width, initial-scale=1">
 		<link rel="stylesheet" href="./index_files/bootstrap.min.css">
 		<link rel="stylesheet" href="./index_files/custom.css">
 		<script src="./index_files/jquery.min.js.download"></script>
 		<script src="./index_files/bootstrap.min.js.download"></script>	
 		<link rel="stylesheet" type="text/css" href="./index_files/custom1.css">
 		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 		<script type="text/javascript">
 			function printDiv(divName) {
			     var printContents = document.getElementById(divName).innerHTML;
			     var originalContents = document.body.innerHTML;

			     document.body.innerHTML = printContents;

			     window.print();

			     document.body.innerHTML = originalContents;
			}
 		</script>
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
						<li><a href="deleteuser.php">Delete User</a></li>
						<li class="active"><a href="grievanceprint.php">Grievance</a></li>
						<li><a href="complaintprint.php">Complaint</a></li>
						<li><a href="openadmission.php">Open Admission</a></li>
						<li><a href="closeadmission.php">Close Admission</a></li>
						<li><a href="adminchangepassword.php">Change Password</a></li>
						<li><a href="logout.php">Logout</a></li>        
					</ul>
				</div>				
			</div>
			
		</div>
		<div class="col-sm-9 col-xs-12">
			<div class="panel panel-primary" id="PrintArea">
				<div class="panel-heading">Grievance</div>
					<div class="panel-body">
						<form action="" class="form-horizontal" method="post" accept-charset="utf-8">
  							<div class="col-xs-12 col-sm-12">
  								<center><b>Girevance</b></center>
  								<table class="table table-responsive" style="text-transform: capitalize;">
  									<thead>
  										<th>Name</th>
  										<th>SID</th>
  										<th>Mobile No.</th>
  										<th>Course</th>
  										<th>Problem Description</th>
  									</thead>
  									<?php
  											require 'connect.php';
  											$queries="SELECT * FROM `grievance`";
  											$result=mysqli_query($con,$queries);
  											
  											while ($row=mysqli_fetch_array($result)) {
  												
  												echo "<tr>
  													<td>$row[0]</td>
  													<td>$row[1]</td>
  													<td>$row[2]</td>
  													<td>$row[3]</td>
  													<td>$row[4]</td>
  												</tr>";
  											}
  									?>
  								</table>
  							</div>
  							<div class="form-group">
  								<div class="col-xs-12 col-sm-10">
  									<button class="btn btn-primary" name="print" onclick="printDiv('PrintArea');">Print <i class="fa fa-print"></i></button>
  										
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