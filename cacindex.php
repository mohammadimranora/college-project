<?php
session_start();
if (!isset($_SESSION['adminid'])) {
	header('location:logout.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title> CAC Home | OCS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./index_files/bootstrap.min.css">
	<link rel="stylesheet" href="./index_files/custom.css">
	<script src="./index_files/jquery.min.js.download"></script>
	<script src="./index_files/bootstrap.min.js.download"></script>
	<link rel="stylesheet" type="text/css" href="./index_files/custom1.css">
	<script type="text/javascript">
		function preventBack() {
			window.history.forward();
		}
		setTimeout("preventBack()", 0);
		window.onunload = function() {
			null
		};
	</script>
</head>

<body>

	<?php require_once "includes/menu.header.php" ?>
	<?php require_once "includes/user.navbar.header.php" ?>
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
						</div>
						<ul class="nav nav-pills nav-stacked" role="tablist" style="padding-top: 10px; display: block;">
							<li class="active"><a href="cacindex.php">Home</a></li>
							<li><a href="allotment.php">Allot Seat & Center</a></li>
							<li><a href="verify.php">Verify Document</a></li>
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
			<div class="col-sm-9 col-xs-12">
				<div class="panel panel-primary">
					<div class="panel-heading">CAC Task</div>
					<div class="panel-body">
						<button class="btn btn-success"><a href="allotment.php" style="text-decoration: none;color: white;"> Allot Seat & Center</a></button>
						<button class="btn btn-success"><a href="verify.php" style="text-decoration: none;color: white;"> Verify Documents</a></button></button>
						<button class="btn btn-success"><a href="enrollmentno.php" style="text-decoration: none;color: white;"> Generate<br> Enrollment No.</a></button>
						<button class="btn btn-success"><a href="report.php" target="_blanck" style="text-decoration: none;color: white;"> Generate Report</a></button></button><br><br>
						<button class="btn btn-success"><a href="enablepay.php" style="text-decoration: none;color: white;"> Enable Payment</a></button></button>
						<button class="btn btn-success"><a href="stats.php" style="text-decoration: none;color: white;">Generate Stats</a></button>
						<button class="btn btn-success"><a href="search.php" style="text-decoration: none;color: white;">Search Student</a></button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php require "includes/foot.footer.php" ?>