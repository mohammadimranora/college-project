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
					Dashboard- DAC
				</div>
				<div class="panel-body">
					<div class="msgimg">
						<img src="./static/img_avatar.png" style=" width: 100px;">

					</div>
					<ul class="nav nav-pills nav-stacked" role="tablist" style="padding-top: 10px; display: block;">
						<li class="active"><a href="dacindex.php">Home</a></li>
						<li><a href="AddCourse.php">Create Course</a></li>
						<li><a href="updatecourse.php">Update Course</a></li>
						<li><a href="deletecourse.php">Delete Course</a></li>
						<li><a href="confirmadmission.php">Confirm Admission</a></li>
						<li><a href="generateadmissionletter.php">Generate Admission Letter</a></li>
						<li><a href="dacchangepassword.php">Change Password</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</div>
			</div>

		</div>
		<div class="col-sm-9 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading">DAC Task</div>
				<div class="panel-body">
					<button class="btn btn-success"><a href="AddCourse.php" style="text-decoration: none; color: white; display: block;">Create Course</a></button>

					<button class="btn btn-success"><a href="updatecourse.php" style="text-decoration: none; color: white; display: block;">Update Course</a></button>

					<button class="btn btn-success"><a href="deletecourse.php" style="text-decoration: none; color: white; display: block;">Delete Course</a></button>

					<button class="btn btn-success"><a href="confirmadmission.php" style="text-decoration: none; color: white; display: block;">Confirm Admission</a></button><br><br>

					<button class="btn btn-success"><a href="generateadmissionletter.php" style="text-decoration: none; color: white; display: block;">Generate<br> Admission<br> Letter</a></button>
				</div>
			</div>
		</div>
	</div>
</div>
<?php require_once "includes/foot.footer.php" ?>