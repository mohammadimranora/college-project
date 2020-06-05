<?php
session_start();
if (!isset($_SESSION['userid'])) {
	header('location:index.php');
}
$pic = $_SESSION["UserData"]["pic"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title> User Home | OCS</title>
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
						Dashboard
					</div>
					<div class="panel-body">
						<div class="msgimg">
							<?php if (!$pic) {  ?>
								<img src="./index_files/img_avatar.png" style=" width: 100px;">
							<?php } else {  ?>
								<img src="<?php echo $pic; ?>" style=" width: 100px;">
							<?php } ?>
						</div>
						<ul class="nav nav-pills nav-stacked" role="tablist" style="padding-top: 10px; display: block;">
							<li class="active"><a href="userindex.php">Home</a></li>
							<li><a href="counsellstage1.php">Apply for Counselling</a></li>
							<li><a href="checkstatus.php">Check Status</a></li>
							<li><a href="feesubmission.php">Fee Submission</a></li>
							<li><a href="changepassword.php">Change Password</a></li>
							<li><a href="logout.php">Logout</a></li>
						</ul>
					</div>
				</div>

			</div>
			<div class="col-sm-9 col-xs-12">
				<div class="panel panel-primary">
					<div class="panel-heading">Instruction</div>
					<div class="panel-body">
						<p style=" font-weight: bold;    color: #3468b9;">
							Read the following Instructions before Filling the choices:
						</p>
						<ol>
							<li><strong>Please make sure that you are having all required information and documents in digital form. Because this system allows user to submit data in one go only.</strong></li>
							<li>In case you want to change your password, Please use&nbsp;Chnage Password&nbsp;link to change password. <strong>New password</strong> will be sent to you on your registered email.</li>

							<li calss="style1">Be ready with these documents.</li>
							<ul>
								<li>Scanned copy of&nbsp;<strong>colored passport size Photo</strong> (3.5 x 4.5 cm) and <strong>Signature</strong>&nbsp;(3.5 x 1.5 cm) in JPG/JPEG format only. The file size of scanned photo should be less than 100KB and signature less than 50KB.
								<li> <strong>Certificates of last exam passed</strong>. Maximum size allowed 200KB</li>
								<li> <strong>Income certificate</strong>, issued by the Competent Authority. Maximum size allowed 200KB</li>
								<li> <strong>Domicile Certificate</strong> by issued by the Competent Authority. Maximum size allowed 200KB</li>
								<li><strong>Income Certificate</strong> by issued by the Competent Authority, If applicable. Maximum size allowed 200KB</li>
								<li>College/School/University <strong>leaving certificate</strong>. Maximum size allowed 200KB</li>
								<li><strong>Adhar card</strong>. Maximum size allowed 200KB</li>
							</ul>
						</ol>
					</div>

				</div>
			</div>

		</div>
	</div>
	<?php require_once "includes/foot.footer.php" ?>