<?php
require_once "../common/connect.php";
require_once "../student/services/student-service.php";

session_start();
if (!isset($_SESSION['userid'])) {
	$URL = url() . "/index.php";
	header("location: $URL ");
}

$pic = $_SESSION["UserData"]["pic"];
$msg = "";
$id = $_SESSION["userid"];
$studentData = StudentService::getStudentData($id);
$_SESSION['courseid'] = isset($studentData['courseid']) ? $studentData['courseid'] : null;
$isApplied = StudentService::isApplied($id);

if (!$isApplied) {
	$msg = "You have already applied for Counselling, need not to submit data again. Thank You. Wish you for your bright future.";
} else {
	if (isset($_POST['procced'])) {
		$URL = url() . "/student/counsellstage2.php";
		header("location: $URL ");
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
				<div class="panel-heading"> Partial Details - Step 1</div>
				<div class="panel-body">
					<form action="" class="form-horizontal" method="post" accept-charset="utf-8">
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" class="form-control" name="name" readonly="" value="<?php echo isset($studentData['name']) ? $studentData['name'] : ''; ?>">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" class="form-control" name="id" readonly="" value="<?php echo isset($studentData['sid']) ? $studentData['sid'] : ''; ?>">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" class="form-control" name="course" readonly="" value="<?php echo isset($studentData['courseid']) ? $studentData['courseid'] : ''; ?>">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" class="form-control" name="category" readonly="" value="<?php echo isset($studentData['category']) ? $studentData['category'] : ''; ?>">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" class="form-control" name="rank" readonly="" value="<?php echo isset($studentData['rank_scored']) ? $studentData['rank_scored'] : ''; ?>">
							</div>
						</div>

						<br>
						<div class="form-group">
							<div class="col-sm-1 col-sm-10">
								<button type="submit" class="btn btn-primary" name="procced">Procced</button>
							</div>
						</div>
					</form>

				</div>

				<div style="padding-left: 15px;padding-right: 15px; color: red; font-weight: bold;"><span><?php echo $msg; ?></span></div>

			</div>

		</div>
	</div>
</div>
<?php require_once "../includes/foot.footer.php" ?>