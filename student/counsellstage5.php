<?php
require_once "../common/connect.php";
session_start();
if (!isset($_SESSION['userid'])) {
	$URL = url()."/index.php";
	header("location: $URL");
}

$cen = $cen1 = $cen2 = $cou = $cou1 = $cou2 = "";
$Status = $msgError = "";
$pic = $_SESSION["UserData"]["pic"];

if (isset($_POST['savenext'])) {

	$cen = $_POST['center'];
	$cou = $_POST['course'];
	$cen1 = $_POST['center1'];
	$cou1 = $_POST['course1'];
	$cen2 = $_POST['center2'];
	$cou2 = $_POST['course2'];

	if ($cen != "" && $cou != "" && $cen1 != "" && $cou1 != "" && $cen2 != "" && $cou2 != "") {

		$sqlInsert = "INSERT INTO `course_choice`(`sid`, `course_id`, `center`, `course`, `center_1`, `course_1`, `center_2`, `course_2`) VALUES ('$_SESSION[userid]','$_SESSION[courseid]','$cen','$cou','$cen','$cou1','$cen2','$cou2');";

		$Status = mysqli_query($con, $sqlInsert);

		if ($Status == 1) {
			$URL = url()."/student/counsellstage50.php";
			header("location: $URL ");
		} else {
			$msgError = "Data have not been saved.";
		}
	} else {
		echo "<script>alert('Please Select Course Options')";
	}
}
?>
<?php require_once "../includes/static.header.php" ?>
<?php require_once "../includes/menu.header.php" ?>
<?php require_once "../includes/user.navbar.header.php" ?>
<div class="container MainContainer">
	<div class="row">
		<?php require_once "../includes/student.side-bar.php" ?>
		<div class="col-sm-8 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading"> Choice Selection - Step 5</div>
				<div class="panel-body">
					<form action="" class="form-horizontal" method="post" accept-charset="utf-8">
						<div class="form-inline inputGroup">
							<div class="col-4">
								<label>1st &nbspChoice <span style="color: red; font-weight: bold;">*</span></label>
								<select class="form-control" name="center" id="center" onchange="setStates();" required="">
									<option selected="" value="" disabled="">--Select Center--</option>
									<option value="HYDERABAD">HYDERABAD</option>
									<option value="BANGALORE">BANGALORE</option>
									<option value="DARBHANGA">DARBHANGA</option>
									<option value="KADAPA">KADAPA</option>
									<option value="CUTTACK">CUTTACK</option>
								</select>
								<select class="form-control" name="course" id="course" required="">
									<option selected="" value="-1" disabled="">--Select Course--</option>
									<option value="">--Please Select a Course</option>
								</select>
							</div>
						</div>
						<br>
						<div class="form-inline inputGroup">
							<div class="col-4">
								<label>2nd Choice <span style="color: red; font-weight: bold;">*</span></label>
								<select class="form-control" name="center1" id="center1" onchange="setStates1();" required="">
									<option selected="" value="" disabled="">--Select Center--</option>
									<option value="HYDERABAD">HYDERABAD</option>
									<option value="BANGALORE">BANGALORE</option>
									<option value="DARBHANGA">DARBHANGA</option>
									<option value="KADAPA">KADAPA</option>
									<option value="CUTTACK">CUTTACK</option>
								</select>
								<select class="form-control" name="course1" id="course1" required="">
									<option selected="" value="-1" disabled="">--Select Course--</option>
									<option value="">--Please Select a Course</option>
								</select>
							</div>
						</div>
						<br>
						<div class="form-inline inputGroup">
							<div class="col-4">
								<label>3rd Choice <span style="color: red; font-weight: bold;">*</span></label>
								<select class="form-control" name="center2" id="center2" onchange="setStates2();" required="">
									<option selected="" value="" disabled="">--Select Center--</option>
									<option value="HYDERABAD">HYDERABAD</option>
									<option value="BANGALORE">BANGALORE</option>
									<option value="DARBHANGA">DARBHANGA</option>
									<option value="KADAPA">KADAPA</option>
									<option value="CUTTACK">CUTTACK</option>
								</select>
								<select class="form-control" name="course2" id="course2" required="">
									<option selected="" value="-1" disabled="">--Select Course--</option>
									<option value="">--Please Select a Course</option>
								</select>
							</div>
						</div>
						<br>
						<div class="form-group">
							<div class="col-xs-12 col-sm-10">
								<button type="submit" class="btn btn-primary" name="savenext" onclick="SeleValid()">Save & Next</button>
							</div>
						</div>
						<div class="panel panel-primary">
							<ul style="color: green;">
								<li> EC ENGG. : Electronics & Communication Engineering</li>
								<li> CS ENGG. : Computer Science Engineering</li>
								<li> IT ENGG. : Information Technology Engineering</li>
								<li> EE ENGG. : Electrical & Electronics Engineering</li>
								<li> Mechanical Engineering</li>
								<li> Automobile Engineering</li>
								<li> Apparel Technology</li>
							</ul>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php require_once "../includes/foot.footer.php" ?>