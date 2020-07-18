<?php
require_once "../common/connect.php";
require_once "../student/services/student-service.php";
session_start();
if (!isset($_SESSION['userid'])) {
	$URL = url() . "/index.php";
	header("location: $URL");
}
$pic = $_SESSION["UserData"]["pic"];
$msg = "";
$sid = $_SESSION['userid'];
$existingData = StudentService::loadExistingPRDetails($sid);
if (isset($_POST['save'])) {
	if (!$existingData && count($existingData) <= 0) {
		$status = StudentService::createStudentPersonalDetails($sid, $_POST);
		if ($status) {
			$URL = url() . "/student/counsellstage3.php";
			header("location: $URL");
		}
	} else {
		$URL = url() . "/student/counsellstage3.php";
		sleep(2);
		header("location: $URL");
	}
}
?>
<?php require_once "../includes/static.header.php" ?>
<?php require_once "../includes/menu.header.php" ?>
<?php require_once "../includes/user.navbar.header.php" ?>
<div class="container MainContainer">
	<div class="row">
		<?php require_once "../includes/student.side-bar.php" ?>
		<div class="col-sm-6 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading"> Personal Details - Step 2</div>
				<div class="panel-body">
					<span><?php echo $msg; ?></span>
					<form action="" class="form-horizontal" method="post" accept-charset="utf-8">
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" class="form-control" value="<?php echo isset($existingData['f_name']) ? $existingData['f_name'] : '' ?>" required id="fname" name="fname" placeholder="Father's Name" autocomplete="off">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" class="form-control" value="<?php echo isset($existingData['m_name']) ? $existingData['m_name'] : '' ?>" name="mname" id="mname" placeholder="Mother's Name" required autocomplete="off">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="date" value="<?php echo isset($existingData['dob']) ? $existingData['dob'] : '' ?>" name="dob" required id="dob" placeholder="Date of Birth DD/MM/YYYY" class="form-control" autocomplete="off">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" value="<?php echo isset($existingData['nationality']) ? $existingData['nationality'] : '' ?>" name="natioanlity" required id="nationality" placeholder="Natioanlity" class="form-control" autocomplete="off">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<select class="form-control" name="religion" id="religion" required>
									<option value="">--Select Religion--</option>
									<option value="Islam" <?php echo (isset($existingData['religion']) && $existingData['religion'] == 'Islam') ? "selected" : "" ?>>Islam</option>
									<option value="Hinduism" <?php echo (isset($existingData['religion']) && $existingData['religion'] == 'Hinduism') ? "selected" : "" ?>>Hinduism</option>
									<option value="Christianity" <?php echo (isset($existingData['religion']) && $existingData['religion'] == 'Christianity') ? "selected" : "" ?>>Christianity</option>
									<option value="Sikhism" <?php echo (isset($existingData['religion']) && $existingData['religion'] == 'Sikhism') ? "selected" : "" ?>>Sikhism</option>
									<option value="Buddhism" <?php echo (isset($existingData['religion']) && $existingData['religion'] == 'Buddhism') ? "selected" : "" ?>>Buddhism</option>
									<option value="Jainism" <?php echo (isset($existingData['religion']) && $existingData['religion'] == 'Jainism') ? "selected" : "" ?>>Jainism</option>
									<option value="Other" <?php echo (isset($existingData['religion']) && $existingData['religion'] == 'Other') ? "selected" : "" ?>>Other</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<select class="form-control" required="" name="income" id="income">
									<option value="">Select Family Income</option>
									<option value="50000" <?php echo (isset($existingData['family_income']) && $existingData['family_income'] == '50000') ? "selected" : "" ?>>0-50,000</option>
									<option value="100000" <?php echo (isset($existingData['family_income']) && $existingData['family_income'] == '100000') ? "selected" : "" ?>>50,0000-1,00,000</option>
									<option value="200000" <?php echo (isset($existingData['family_income']) && $existingData['family_income'] == '200000') ? "selected" : "" ?>>1,00,000-2,00,0000</option>
									<option value="300000" <?php echo (isset($existingData['family_income']) && $existingData['family_income'] == '300000') ? "selected" : "" ?>>2,00,000-5,00,000</option>
									<option value="500000" <?php echo (isset($existingData['family_income']) && $existingData['family_income'] == '500000') ? "selected" : "" ?>>5,00,000-Above</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" value="<?php echo isset($existingData['student_mobile']) ? $existingData['student_mobile'] : '' ?>" name="mobile_student" required id="mobile_student" placeholder="Enter your Mobile Number" class="form-control" autocomplete="off">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" value="<?php echo isset($existingData['parents_mobile']) ? $existingData['parents_mobile'] : '' ?>" name="mobile_parents" required id="mobile_parents" placeholder="Enter your Parents Mobile Number" class="form-control" autocomplete="off">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="email" value="<?php echo isset($existingData['email']) ? $existingData['email'] : '' ?>" name="email" required id="email" placeholder="Enter your Email Number" class="form-control" autocomplete="off" style="text-transform: lowercase;">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" value="<?php echo isset($existingData['adhar']) ? $existingData['adhar'] : '' ?>" name="ano" required id="ano" placeholder="Adhar Number Like 1245-4865-4512" class="form-control" autocomplete="off">
							</div>
						</div>
						<br>
						<label>Are you a Kashmiri Migrant?<span style="color: red; font-weight: bold">*</span></label>
						<div class="form-group">
							<div class="col-sm-12">
								<label>Yes</label>&nbsp<input type="radio" name="Migrant" value="Yes" <?php echo (isset($existingData['kashmiri_migrant']) && $existingData['kashmiri_migrant'] == 'Yes') ? "checked" : "" ?>>
								<label>No</label>&nbsp<input type="radio" name="Migrant" value="No" <?php echo (isset($existingData['kashmiri_migrant']) && $existingData['kashmiri_migrant'] == 'No') ? "checked" : "" ?>>
							</div>
						</div>
						<br>
						<div class="form-group">
							<div class="col-xs-12 col-sm-10">
								<button type="submit" class="btn btn-primary" name="save" onclick="validatePersonal()"> Save & Next</button>
							</div>
						</div>
					</form>
				</div>

			</div>

		</div>
	</div>
</div>
<?php require_once "../includes/foot.footer.php" ?>