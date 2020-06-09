<?php
session_start();
if (!isset($_SESSION['adminid'])) {
	header('location:logout.php');
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
						<li class="active"><a href="adminindex.php">Home</a></li>
						<li><a href="createuser.php">Create User</a></li>
						<li><a href="updateuser.php">Update User</a></li>
						<li><a href="deleteuser.php">Delete User</a></li>
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
		<div class="col-sm-9 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading">Admin Task</div>
				<div class="panel-body">
					<button class="btn btn-success"><a href="createuser.php" style="text-decoration: none; color: white; display: block;">Create User</a></button>
					<button class="btn btn-success"><a href="updateuser.php" style="text-decoration: none; color: white; display: block;">Update User</a></button>
					<button class="btn btn-success"><a href="deleteuser.php" style="text-decoration: none; color: white; display: block;">Delete User</a></button>
					<button class="btn btn-success"><a href="openadmission.php" style="text-decoration: none; color: white; display: block;">Open Admission</a></button><br><br>
					<button class="btn btn-success"><a href="closeadmission.php" style="text-decoration: none; color: white; display: block;">Close Admission</a></button>
					<button class="btn btn-success"><a href="grievanceprint.php" style="text-decoration: none; color: white; display: block;">Grievance</a></button>
					<button class="btn btn-success"><a href="complaintprint.php" style="text-decoration: none; color: white; display: block;">Complaint</a></button>
				</div>
			</div>
		</div>
	</div>
</div>
<?php require_once "includes/foot.footer.php" ?>