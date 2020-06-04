<?php
	require 'connect.php';
	session_start();
	if(!isset($_SESSION['adminid']))
	{
		header('location:logout.php');
	}
	$FetchData="SELECT * FROM `report`";
	$resource=mysqli_query($con,$FetchData);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  		<title> Generate Report | OCS</title>
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
		<div class="col-sm-12 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading">Report</div>
				<div class="panel-body" id="PrintArea">
					<table class="table table-hover">
						<thead>
							<th>SID</th>
							<th>NAME</th>
							<th>RANK</th>
							<th>CASTE</th>
							<th>KASHMIRI MIGRANT</th>
							<th>URDU</th>
							<th>SPORTS</th>
							<th>CENTER1</th>
							<th>COURSE1</th>
							<th>CENTER2</th>
							<th>COURSE2</th>
							<th>CENTER3</th>
							<th>COURSE3</th>
						</thead>
						<?php

						while ($row = mysqli_fetch_array($resource)) {
								
								$sid=$row[0];
								$name=$row[1];
								$rank=$row[2];
								$caste=$row[3];
								$kmigrant=$row[4];
								$urdu=$row[5];
								$sports=$row[6];
								$center1=$row[7];
								$course1=$row[8];
								$center2=$row[9];
								$course2=$row[10];
								$center3=$row[11];
								$course3=$row[12];



								echo "<tr>
								        <td>$sid</td>
								        <td>$name</td>
								        <td>$rank</td>
								        <td>$caste</d>
								        <td>$kmigrant</td>
								        <td>$urdu</td>
								        <td>$sports</td>
								        <td>$center1</td>
								        <td>$course1</td>
								        <td>$center2</td>
								        <td>$course2</td>
								        <td>$center3</td>
								        <td>$course3</td>
								      </tr>";
							}
						?>
						
					</table>
				</div>
			</div>	
			<center>
				<form action="" method="post">
					<div class="form-group">
						<div class="col-xs-12 col-sm-10">
							<button class="btn btn-primary" name="print" onclick="printDiv('PrintArea');">Print Report <i class="fa fa-print"></i></button>
							<button class="btn btn-primary" onclick="closeMe()">Close this Window</button>
  							
  						</div>
  					</div>
  				</form>
			</center>
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