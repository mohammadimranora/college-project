<?php
require 'connect.php';
session_start();
if (!isset($_SESSION['adminid'])) {
	header('location:logout.php');
}
$resi = $_SESSION['DataUser']['residential_cert'];
$caste = $_SESSION['DataUser']['caste_cert'];
$income = $_SESSION['DataUser']['income_cert'];
$memo = $_SESSION['DataUser']['last_exam_marksmemo'];
$adhar = $_SESSION['DataUser']['adhar'];
$lcert = $_SESSION['DataUser']['leaving_cert'];
$sid = $_SESSION['DataUser']['sid'];
$msg = "";
if (isset($_POST['verified'])) {

	$queries = "INSERT INTO `documents`(`sid`, `isverified`) VALUES ('$sid','1')";
	$status = mysqli_query($con, $queries);

	if ($status == 1) {
		$msg = "Documents Verified Successfully";
	} else {
		$msg = "Documents Not Verified Successfully";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title> Documents Bundle | OCS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./index_files/bootstrap.min.css">
	<link rel="stylesheet" href="./index_files/custom.css">
	<script src="./index_files/jquery.min.js.download"></script>
	<script src="./index_files/bootstrap.min.js.download"></script>
	<link rel="stylesheet" type="text/css" href="./index_files/custom1.css">
	<script type="text/javascript">
		function closeMe() {
			window.opener = self;
			window.close();
		}
	</script>
</head>

<body>
	<?php require_once "includes/menu.header.php" ?>
	<?php require_once "includes/user.navbar.header.php" ?>
	<div class="container MainContainer">
		<div class="row">
			<div class="col-sm-2">

			</div>
			<div class="col-md-8 col-xs-12">
				<div class="panel panel-primary">
					<div class="panel-heading">Documents</div>
					<span style="color: green; font-weight: bold;"><?php echo $msg; ?></span>
					<div class="panel-body">
						<button class="btn btn-success"><a href="<?php echo $resi; ?>" target="_blank">Residentail<br>Certificate</a></button>
						<button class="btn btn-success"><a href="<?php echo $caste; ?>" target="_blank">Caste<br>Certificate</a></button>
						<button class="btn btn-success"><a href="<?php echo $income; ?>" target="_blank">Income<br>Certificate</a></button>
						<button class="btn btn-success"><a href="<?php echo $memo; ?>" target="_blank">Last Exam<br>Memo</a></button>
						<button class="btn btn-success"><a href="<?php echo $adhar; ?>" target="_blank">Adhar<br>Card</a></button>
						<button class="btn btn-success"><a href="<?php echo $lcert; ?>" target="_blank">Leaving<br>Certificate</a></button>
					</div>
				</div>
				<form action="" method="post" class="form-horizontal">
					<div class="form-group">
						<div class="col-sm-12">
							<input type="submit" name="verified" class="btn btn-primary" value="Verified">
							<button class="btn btn-primary" onclick="closeMe()">Close this Window</button>

						</div>

					</div>

				</form>
			</div>
		</div>
	</div>
	<?php require_once "includes/foot.footer.php" ?>