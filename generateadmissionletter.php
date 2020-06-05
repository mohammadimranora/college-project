<?php
require 'connect.php';
session_start();
if (!isset($_SESSION['adminid'])) {
	header('location:logout.php');
}
$msgError = "";

if (isset($_POST['generate'])) {

	$sid = $_POST['sid'];

	$checkStatus = "SELECT `eno` FROM `admission` WHERE sid='$sid'";
	$result = mysqli_query($con, $checkStatus);
	$data = mysqli_fetch_array($result);

	if ($data[0] === null) {

		$msgError = "Enrollment No. hasn't been generated yet.";
	} else {
		$_SESSION['sid'] = $sid;
		echo "<script>window.open('letter.php')</script>";
	}
}
?>
<?php require_once "includes/static.header.php" ?>
<?php require_once "includes/menu.header.php" ?>
<?php require_once "includes/user.navbar.header.php" ?>
<div class="container MainContainer">
	<div class="row">
		<div class="col-sm-3 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					Dashboard- DAC
				</div>
				<div class="panel-body">
					<div class="msgimg">
						<img src="./index_files/img_avatar.png" style=" width: 100px;">

					</div>
					<ul class="nav nav-pills nav-stacked" role="tablist" style="padding-top: 10px; display: block;">
						<li><a href="dacindex.php">Home</a></li>
						<li><a href="AddCourse.php">Create Course</a></li>
						<li><a href="updatecourse.php">Update Course</a></li>
						<li><a href="deletecourse.php">Delete Course</a></li>
						<li><a href="confirmadmission.php">Confirm Admission</a></li>
						<li class="active"><a href="generateadmissionletter.php">Generate Admission Letter</a></li>
						<li><a href="dacchangepassword.php">Change Password</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</div>
			</div>

		</div>
		<div class="col-sm-7 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading">Generate Admission Letter</div>
				<div class="panel-body">
					<span style="color: red; font-weight: bold;"><?php echo $msgError; ?></span>
					<form action="" class="form-horizontal" method="post" accept-charset="utf-8">
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" name="sid" id="sid" class="form-control" placeholder="Student Id" required="" style="text-transform: uppercase;">
							</div>
						</div>
						<div class="form-group">
							<div class="col-xs-12 col-sm-10">
								<button type="submit" class="btn btn-primary" name="generate" onclick="generateValid()">Generate Admission Letter</button>
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