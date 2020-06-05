<?php
require 'connect.php';
session_start();
if (!isset($_SESSION['adminid'])) {
	header('location:logout.php');
}
$sid = $msg = "";
if (isset($_POST['enable'])) {
	$sid = $_POST['sid'];
	$IsDocVer = "SELECT `isverified` FROM `documents` WHERE sid='$sid'";
	$result = mysqli_query($con, $IsDocVer);
	$row = mysqli_fetch_array($result);
	if ($row[0] == 1) {
		$EnablePay = "UPDATE `allotment` SET `payment_enable`='1' WHERE sid='$sid'";
		$status = mysqli_query($con, $EnablePay);
		if ($status == 1) {
			$msg = "Payment has been enabled";
		} else {
			$msg = "Payment hasn't been enabled";
		}
	} else {
		$msg = "Documents hasn't been verified.";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title> Enable Payment | OCS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./index_files/bootstrap.min.css">
	<link rel="stylesheet" href="./index_files/custom.css">
	<script src="./index_files/jquery.min.js.download"></script>
	<script src="./index_files/bootstrap.min.js.download"></script>
	<link rel="stylesheet" type="text/css" href="./index_files/custom1.css">
	<script type="text/javascript">
		function payValid() {
			var sid = document.getElementById("sid").value;
			if (sid == "" || sid == null) {
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
							<img src="./index_files/img_avatar.png" style=" width: 100px;">

						</div>
						<ul class="nav nav-pills nav-stacked" role="tablist" style="padding-top: 10px; display: block;">
							<li><a href="cacindex.php">Home</a></li>
							<li><a href="allotment.php">Allot Seat & Center</a></li>
							<li><a href="verify.php">Verify Document</a></li>
							<li><a href="enrollmentno.php">Generate Enrollment No</a></li>
							<li><a href="stats.php">Generate Stats</a></li>
							<li><a href="search.php">Search Student</a></li>
							<li><a href="report.php" target="_blank">Generate Report</a></li>
							<li class="active"><a href="enablepay.php">Enable Payment</a></li>
							<li><a href="cacchangepassword.php">Change Password</a></li>
							<li><a href="logout.php">Logout</a></li>
						</ul>
					</div>
				</div>

			</div>
			<div class="col-sm-6 col-xs-12">
				<div class="panel panel-primary">
					<div class="panel-heading">Enable Payment</div>
					<div class="panel-body">
						<span style="color: green; font-weight: bold;"><?php echo $msg; ?></span>
						<form action="" class="form-horizontal" method="post" accept-charset="utf-8">
							<div class="form-group">
								<div class="col-sm-12">
									<input type="text" class="form-control" id="sid" placeholder="Enter Student ID" required name="sid" autocomplete="off">
								</div>
							</div>

							<div class="form-group">
								<div class="col-sm-5 col-sm-7">
									<button type="submit" class="btn btn-primary" name="enable" onclick="payValid()">Enable Payment</button>
									<button type="reset" class="btn btn-primary"> Clear</button>
								</div>
							</div>
						</form>

					</div>
				</div>
			</div>
		</div>
	</div>
	<?php require_once "includes/foot.footer.php" ?>