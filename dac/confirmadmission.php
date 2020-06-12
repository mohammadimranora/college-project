<?php
session_start();
if (!isset($_SESSION['adminid'])) {
	header('location:logout.php');
}
?>
<!DOCTYPE html>
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
						<li><a href="dacindex.php">Home</a></li>
						<li><a href="AddCourse.php">Create Course</a></li>
						<li><a href="updatecourse.php">Update Course</a></li>
						<li><a href="deletecourse.php">Delete Course</a></li>
						<li class="active"><a href="confirmadmission.php">Confirm Admission</a></li>
						<li><a href="generateadmissionletter.php">Generate Admission Letter</a></li>
						<li><a href="dacchangepassword.php">Change Password</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</div>
			</div>

		</div>
		<div class="col-sm-7 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading">Confirm Admission</div>
				<div class="panel-body">
					<form action="" class="form-horizontal" method="post" accept-charset="utf-8">
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" name="sid" id="sid" class="form-control" placeholder="Student Id" required="" style="text-transform: uppercase;">
							</div>
						</div>
						<div class="form-group">
							<div class="col-xs-12 col-sm-10">
								<button type="submit" class="btn btn-primary" name="confirm" onclick="cnfAdmissionValid()">Confirm Admission</button>
								<button type="reset" class="btn btn-primary">Clear</button>
							</div>
						</div>
					</form>
					<div class="panel panel-primary">
						<div class="panel-heading">Details Here</div>
						<div class="panel-body">
							<span style="color: green; font-weight: bold; text-transform: uppercase;">
								<?php
								require 'connect.php';
								$sid = $msg = "";
								if (isset($_POST['confirm'])) {

									$sid = $_POST['sid'];

									$checkStatus1 = "SELECT sid from counsell_status where sid='$sid'";
									$checkStatus2 = "SELECT sid,payment_enable from allotment where sid='$sid'";
									$checkStatus3 = "SELECT sid,payment_status from payment_info where sid='$sid'";

									$result1 = mysqli_query($con, $checkStatus1);
									$dataDB1 = mysqli_fetch_array($result1);

									$result2 = mysqli_query($con, $checkStatus2);
									$dataDB2 = mysqli_fetch_array($result2);

									$result3 = mysqli_query($con, $checkStatus3);
									$dataDB3 = mysqli_fetch_array($result3);

									if ($dataDB1[0] == null) {

										echo "Student hasn't submitted counselling application";
									} else {
										if ($dataDB2[0] == null) {

											echo "Center and Course hasn't been alloted.";
										} else {
											if ($dataDB2[1] == 0) {

												echo "Payment wasn't activated. Please contact Central Admission Cell.";
											} else {
												if ($dataDB3[0] == null && $dataDB3[1] == 0) {

													echo "Payment hasn't been done. Kindly pay the Admission Fee. ";
												} else {
													$selectData = "SELECT `center_alloted`, `course_alloted` FROM `allotment` WHERE sid='$sid'";

													$takeData = mysqli_query($con, $selectData);
													$dataDB4 = mysqli_fetch_array($takeData);

													$insertData = "INSERT INTO `admission`(`sid`,`center`, `course`) VALUES ('$sid','$dataDB4[0]','$dataDB4[1]');";

													$status = mysqli_query($con, $insertData);


													if ($status == 1) {

														echo "Admission has been confirmed.";
													} else {
														echo "Admission has not been confirmed";
													}
												}
											}
										}
									}
								}
								?>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php require_once "includes/foot.footer.php" ?>