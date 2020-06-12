<?php
require_once "../common/connect.php";
session_start();
if (!isset($_SESSION['userid'])) {
	$URL = url()."/index.php";
	header("location: $URL ");
}
$pic = $_SESSION["UserData"]["pic"];
$urdu = $level = $sports = $errorMsg = "";
if (isset($_POST['savenext'])) {

	$urdu = $_POST['Urdu'];
	$level = $_POST['level'];
	$sports = $_POST['sports'];

	if ($urdu != "" && $level != "" && $sports != "") {

		$SqlInsert = "INSERT INTO `studiedurduandsports`(`sid`, `isstudiedurdu`, `levelofstudy`, `issportsperson`) VALUES ('$_SESSION[userid]','$urdu','$level','$sports')";
		$Status = mysqli_query($con, $SqlInsert);

		if ($Status == 1) {
			$URL = url()."/student/counsellstage6.php";
			header("location: $URL ");
		} else {
			$errorMsg = "Data haven't been saved";
		}
	} else {
		echo "<script>alert('Please select all required value');</script>";
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
				<div class="panel-heading"> Choice Selection - Step 5-1</div>
				<div class="panel-body">
					<form action="" class="form-horizontal" method="post" accept-charset="utf-8">
						<div class="form-group">
							<div class="col-sm-12">
								<label>Have you studied Urdu<span style="color: red; font-weight: bold;">*</span></label><br>
								<label>Yes</label>&nbsp<input type="radio" name="Urdu" value="Yes">&nbsp
								<label>No</label>&nbsp<input type="radio" name="Urdu" value="No">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<select class="form-control" name="level" id="type1" required="">
									<option value="">--Select Level of Study Urdu--</option>
									<option value="Matriculation">Matriculation</option>
									<option value="Intermediate">Intermediate</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<label>Are you a Sports Person<span style="color: red; font-weight: bold;">*</span></label><br>
								<label>Yes</label>&nbsp<input type="radio" name="sports" value="Yes">&nbsp
								<label>No</label>&nbsp<input type="radio" name="sports" value="No">
							</div>
						</div>
						<div class="form-group">
							<div class="col-xs-12 col-sm-10">
								<button type="submit" class="btn btn-primary" name="savenext" onclick="urduValidate()">Save & Next</button>
								<button type="reset" class="btn btn-primary">Clear</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php require_once "../includes/foot.footer.php" ?>