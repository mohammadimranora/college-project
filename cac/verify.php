<?php
require 'connect.php';
session_start();
if (!isset($_SESSION['adminid'])) {
	header('location:logout.php');
}
$msg = "";
if (isset($_POST['verify'])) {

	$sid = $_POST['sid'];
	$queries = "SELECT sid FROM `student_info` WHERE sid='$sid'";
	$result = mysqli_query($con, $queries);

	$queries1 = "SELECT `sid` FROM `counsell_status` WHERE sid='$sid'";
	$resultnow = mysqli_query($con, $queries1);


	if (mysqli_num_rows($result) > 0) {

		if (mysqli_num_rows($resultnow) > 0) {

			$queries1 = "SELECT *FROM `student_info` WHERE sid='$sid'";
			$result1 = mysqli_query($con, $queries1);
			$row = mysqli_fetch_assoc($result1);
			$_SESSION['DataUser'] = $row;

			echo "<script>window.open('docbundle.php')</script>";
		} else {
			$msg = "Student has not uploaded documents";
		}
	} else {
		$msg = "Invalid Student ID";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title> Verify Documents | OCS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./static/bootstrap.min.css">
	<link rel="stylesheet" href="./static/custom.css">
	<script src="./static/jquery.min.js.download"></script>
	<script src="./static/bootstrap.min.js.download"></script>
	<link rel="stylesheet" type="text/css" href="./static/custom1.css">
	<script type="text/javascript">
		function verifyValid() {
			var stid = document.getElementById("sid").value;
			if (stid == "" || stid == null) {
				alert("Please Enter Student ID");
				sid.focus();
				return false;
			}
		}
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
							<img src="./static/img_avatar.png" style=" width: 100px;">
						</div>
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
						<span style="font-weight: bold; color: green;"><?php echo $msg; ?></span>
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
	<?php require_once "includes/foot.footer.php" ?>