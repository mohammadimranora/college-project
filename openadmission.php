<?php
require 'connect.php';
session_start();
if (!isset($_SESSION['adminid'])) {
	header('location:logout.php');
}
$msg = $msgToDisplay = "";
if (isset($_POST['open'])) {

	$msg = $_POST['msg'];

	$checkStatus = "Select status from isadmissionopen";
	$result = mysqli_query($con, $checkStatus);
	$row = mysqli_fetch_array($result);

	if ($row[0] == 1) {

		$msgToDisplay = "Counselling is Already open.";
	} else {
		$openAdmission = "UPDATE `isadmissionopen` SET `msg`='$msg',`status`='1'";
		$status = mysqli_query($con, $openAdmission);
		if ($status == 1) {

			$msgToDisplay = "Now Counselling is open";
		}
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
					Dashboard- Admin
				</div>
				<div class="panel-body">
					<div class="msgimg">
						<img src="./static/img_avatar.png" style=" width: 100px;">

					</div>
					<ul class="nav nav-pills nav-stacked" role="tablist" style="padding-top: 10px; display: block;">
						<li><a href="adminindex.php">Home</a></li>
						<li><a href="createuser.php">Create User</a></li>
						<li><a href="updateuser.php">Update User</a></li>
						<li><a href="deleteuser.php">Delete User</a></li>
						<li><a href="grievanceprint.php">Grievance</a></li>
						<li><a href="complaintprint.php">Complaint</a></li>
						<li class="active"><a href="openadmission.php">Open Admission</a></li>
						<li><a href="closeadmission.php">Close Admission</a></li>
						<li><a href="adminchangepassword.php">Change Password</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</div>
			</div>

		</div>
		<div class="col-sm-6 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading">Open Admission</div>
				<div class="panel-body">
					<span style="color: green; font-weight: bold;"><?php echo $msgToDisplay; ?></span>
					<form action="" class="form-horizontal" method="post" accept-charset="utf-8">
						<div class="form-group">
							<div class="col-sm-12">
								<label>Message</label>
								<br>
								<textarea name="msg" class="form-control" rows="3" cols="10" required="" autofocus="" style="text-transform: capitalize;"></textarea>
							</div>
						</div>
						<br>
						<div class="form-group">
							<div class="col-xs-12 col-sm-10">
								<button type="submit" class="btn btn-primary" name="open">Open Admission</button>
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