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
						<img src="./index_files/img_avatar.png" style=" width: 100px;">

					</div>
					<ul class="nav nav-pills nav-stacked" role="tablist" style="padding-top: 10px; display: block;">
						<li><a href="dacindex.php">Home</a></li>
						<li><a href="AddCourse.php">Create Course</a></li>
						<li><a href="updatecourse.php">Update Course</a></li>
						<li class="active"><a href="deletecourse.php">Delete Course</a></li>
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
				<div class="panel-heading">Delete Course</div>
				<div class="panel-body">
					<form action="" class="form-horizontal" method="post" accept-charset="utf-8">
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" id="ccid" class="form-control" name="catCourseId" placeholder="category Course Id" required="" style="text-transform: uppercase;">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" id="did" name="deptid" required="" placeholder="Dept. ID" class="form-control" style="text-transform: uppercase;">
							</div>
						</div>
						<div class="form-group">
							<div class="col-xs-12 col-sm-10">
								<button type="submit" class="btn btn-primary" name="getdetail" onclick="deleteValid()">Get Course Details</button>
								<button type="submit" class="btn btn-primary" name="delete" onclick="deleteValid()">Delete</button>
							</div>
						</div>
					</form>
					<div class="panel panel-primary">
						<div class="panel-heading">Course Details Here</div>
						<div class="panel-body">
							<span style="color: green; font-weight: bold; text-transform: uppercase;">
								<?php
								require 'connect.php';
								$dataDB = "";
								$msgToDisplay = "";
								$data1 = $data2 = "";

								if (isset($_POST['getdetail'])) {

									$data1 = $_POST['catCourseId'];
									$data2 = $_POST['deptid'];
									$CourseCheck = "SELECT * FROM `course_info` WHERE cat_course_id='$data1' AND dept_id='$data2'";

									$dataDB = mysqli_query($con, $CourseCheck);

									$rownum = mysqli_num_rows($dataDB);
									$row = mysqli_fetch_array($dataDB);

									if ($rownum == NULL) {

										echo "Course not found";
									} else {
										echo "Course ID : $row[0] &nbsp Category Course ID : $row[1]<br><br>Course Name : $row[2] &nbsp Dept. ID : $row[3]<br><br>Duration : $row[4] Sem&nbsp No. of Seats : $row[5]<br><br>Type : $row[6] &nbsp Fee : $row[7]<br><br>Reserved Seats : $row[8]";
									}
								}
								$msg = "";
								if (isset($_POST['delete'])) {

									$data1 = $_POST['catCourseId'];
									$data2 = $_POST['deptid'];


									$query = "DELETE FROM `course_info` WHERE cat_course_id='$data1' AND dept_id='$data2'";

									$statusDelete = mysqli_query($con, $query);

									if ($statusDelete == 1) {
										$msg = " Course was deleted.";
									} else {
										$msg = "Course wasn't deleted";
									}
								}
								echo $msg;
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