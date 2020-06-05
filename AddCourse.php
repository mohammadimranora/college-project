<?php
require 'connect.php';
session_start();
if (!isset($_SESSION['adminid'])) {

	header('location: logout.php');
}
$formData = array();
$msgToDisplay = "";

if (isset($_POST['create'])) {

	$formData[0] = $_POST['cid'];
	$formData[1] = $_POST['catCourseId'];
	$formData[2] = $_POST['coursename'];
	$formData[3] = $_POST['deptid'];
	$formData[4] = $_POST['duration'];
	$formData[5] = $_POST['no_of_seat'];
	$formData[6] = $_POST['type'];
	$formData[7] = $_POST['fee'];
	$formData[8] = $_POST['reservedseat'];

	$CourseCheck = "SELECT `cat_course_id`, `dept_id` FROM `course_info` WHERE cat_course_id='$formData[1]' AND dept_id='$formData[3]'";
	$CourseInsert = "INSERT INTO `course_info`(`course_id`, `cat_course_id`, `course_name`, `dept_id`, `duration`, `no_of_seats`, `type`, `fee`, `reserved_seats`) VALUES ('$formData[0]','$formData[1]','$formData[2]','$formData[3]','$formData[4]','$formData[5]','$formData[6]','$formData[7]','$formData[8]')";

	$CourseCheckStatus = mysqli_query($con, $CourseCheck);

	if (mysqli_num_rows($CourseCheckStatus) > 0) {

		$msgToDisplay = "Course is added already. Insert Another course";
	} else {
		$CourseAddStatus = mysqli_query($con, $CourseInsert);
		if ($CourseAddStatus == 1) {
			$msgToDisplay = "Course has been created";
		}
	}
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
						<img src="./index_files/img_avatar.png" style=" width: 100px;">

					</div>
					<ul class="nav nav-pills nav-stacked" role="tablist" style="padding-top: 10px; display: block;">
						<li><a href="dacindex.php">Home</a></li>
						<li class="active"><a href="AddCourse.php">Create Course</a></li>
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
		<div class="col-sm-7 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading">Create Course</div>
				<div class="panel-body">
					<span style="color: green; font-weight: bold; text-transform: capitalize;"><?php echo $msgToDisplay; ?></span>
					<form action="" class="form-horizontal" method="post" accept-charset="utf-8">
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" value="" id="courseid" class="form-control" required="" name="cid" placeholder="Course ID" style="text-transform: uppercase;">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" id="ccid" class="form-control" name="catCourseId" placeholder="category Course Id" required="" style="text-transform: uppercase;">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" id="cname" name="coursename" required="" placeholder="Course Name" class="form-control" style="text-transform: uppercase;">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" id="did" name="deptid" required="" placeholder="Dept. ID" class="form-control" style="text-transform: uppercase;">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<select class="form-control" name="duration" id="cduration" required="">
									<option value="">--Select Course Duration--</option>
									<option value="1">1 Semester</option>
									<option value="2">2 Semester</option>
									<option value="4">4 Semester</option>
									<option value="6">6 Semester</option>
									<option value="8">8 Semester</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="Number" id="nos" name="no_of_seat" required="" placeholder="Number of Seat" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<select name="type" id="ctype" class="form-control" required="">
									<option value="">--Select Course Type--</option>
									<option value="REGULAR">Regular</option>
									<option value="DISTANCE">Distance</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="Number" id="cfee" name="fee" required="" placeholder="Course Fee" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="Number" id="rseat" name="reservedseat" required="" placeholder="Reserved Seat" class="form-control">
							</div>
						</div>
						<br>
						<div class="form-group">
							<div class="col-xs-12 col-sm-10">
								<button type="submit" class="btn btn-primary" name="create" onclick="addValidate()">Create</button>
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