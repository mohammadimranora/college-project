<?php
session_start();
if (!isset($_SESSION['userid'])) {
	header('location: index.php');
}
$pic = $_SESSION["UserData"]["pic"];
$image = $msg = $msg2 = $finalMsg = "";
$result8 = "";
$target_file = "";

if (isset($_POST['submit1'])) {

	$image = addslashes($_FILES['pic']['tmp_name']);
	$name = addslashes($_FILES['pic']['name']);
	$image = file_get_contents($image);


	$imageFileType = strtolower(pathinfo($_FILES["pic"]["name"], PATHINFO_EXTENSION));
	$target_file = "upload/pic_" . time() . '.' . $imageFileType;
	if (move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) {
		$msg2 = "The file " . basename($_FILES["pic"]["name"]) . " has been uploaded.";
	} else {
		$msg2 = "Sorry, there was an error uploading your file.";
	}
	$msg = savePic($target_file);
}
function savePic($image)
{
	require 'connect.php';
	$sqlInsertPic = "update  student_info set pic='$image' where sid='$_SESSION[userid]'";
	$result1 = mysqli_query($con, $sqlInsertPic);
	if ($result1 == 1) {
		$msg = "Picture Uploaded Sucessfully";
	}
	return $msg;
}
if (isset($_POST['submit2'])) {

	$image = addslashes($_FILES['sign']['tmp_name']);
	$name = addslashes($_FILES['sign']['name']);
	$image = file_get_contents($image);

	$imageFileType = strtolower(pathinfo($_FILES["sign"]["name"], PATHINFO_EXTENSION));
	$target_file = "upload/sign_" . time() . '.' . $imageFileType;
	if (move_uploaded_file($_FILES["sign"]["tmp_name"], $target_file)) {
		$msg2 = "The file " . basename($_FILES["sign"]["name"]) . " has been uploaded.";
	} else {
		$msg2 = "Sorry, there was an error uploading your file.";
	}
	$msg = saveSign($target_file);
}
function saveSign($image)
{
	$msg = "";
	require 'connect.php';
	$sqlInsertSign = "UPDATE `student_info` SET `signature`='$image' WHERE sid='$_SESSION[userid]'";
	$result2 = mysqli_query($con, $sqlInsertSign);
	if ($result2 == 1) {
		$msg = "Signature Uploaded Sucessfully";
	}
	return $msg;
}
if (isset($_POST['submit3'])) {

	$image = addslashes($_FILES['residential']['tmp_name']);
	$name = addslashes($_FILES['residential']['name']);
	$image = file_get_contents($image);

	$imageFileType = strtolower(pathinfo($_FILES["residential"]["name"], PATHINFO_EXTENSION));
	$target_file = "upload/residential_" . time() . '.' . $imageFileType;
	if (move_uploaded_file($_FILES["residential"]["tmp_name"], $target_file)) {
		$msg2 = "The file " . basename($_FILES["residential"]["name"]) . " has been uploaded.";
	} else {
		$msg2 = "Sorry, there was an error uploading your file.";
	}
	$msg = saveResidential($target_file);
}
function saveResidential($image)
{
	$msg = "";
	require 'connect.php';
	$sqlInsertResidential = "UPDATE `student_info` SET `residential_cert`='$image' WHERE sid='$_SESSION[userid]'";

	$result3 = mysqli_query($con, $sqlInsertResidential);

	if ($result3 == 1) {
		$msg = "Residential Certificate Uploaded Sucessfully";
	}
	return $msg;
}
if (isset($_POST['submit4'])) {

	$image = addslashes($_FILES['caste']['tmp_name']);
	$name = addslashes($_FILES['caste']['name']);
	$image = file_get_contents($image);

	$imageFileType = strtolower(pathinfo($_FILES["caste"]["name"], PATHINFO_EXTENSION));
	$target_file = "upload/caste_" . time() . '.' . $imageFileType;
	if (move_uploaded_file($_FILES["caste"]["tmp_name"], $target_file)) {
		$msg2 = "The file " . basename($_FILES["caste"]["name"]) . " has been uploaded.";
	} else {
		$msg2 = "Sorry, there was an error uploading your file.";
	}
	$msg = saveCaste($target_file);
}
function saveCaste($image)
{
	$msg = "";
	require 'connect.php';
	$sqlInsertCaste = "UPDATE `student_info` SET `caste_cert`='$image' WHERE sid='$_SESSION[userid]'";

	$result4 = mysqli_query($con, $sqlInsertCaste);

	if ($result4 == 1) {
		$msg = "Caste Certificate Uploaded Sucessfully";
	}
	return $msg;
}
if (isset($_POST['submit5'])) {

	$image = addslashes($_FILES['income']['tmp_name']);
	$name = addslashes($_FILES['income']['name']);
	$image = file_get_contents($image);

	$imageFileType = strtolower(pathinfo($_FILES["income"]["name"], PATHINFO_EXTENSION));
	$target_file = "upload/income_" . time() . '.' . $imageFileType;
	if (move_uploaded_file($_FILES["income"]["tmp_name"], $target_file)) {
		$msg2 = "The file " . basename($_FILES["income"]["name"]) . " has been uploaded.";
	} else {
		$msg2 = "Sorry, there was an error uploading your file.";
	}
	$msg = saveIncome($target_file);
}
function saveIncome($image)
{
	$msg = "";
	require 'connect.php';
	$sqlInsertIncome = "UPDATE `student_info` SET `income_cert`='$image' WHERE sid='$_SESSION[userid]'";
	$result5 = mysqli_query($con, $sqlInsertIncome);
	if ($result5 == 1) {
		$msg = "Income Certificate Uploaded Sucessfully";
	}
	return $msg;
}
if (isset($_POST['submit6'])) {

	$image = addslashes($_FILES['lastexampass']['tmp_name']);
	$name = addslashes($_FILES['lastexampass']['name']);
	$image = file_get_contents($image);
	$imageFileType = strtolower(pathinfo($_FILES["lastexampass"]["name"], PATHINFO_EXTENSION));
	$target_file = "upload/lastexampass_" . time() . '.' . $imageFileType;
	if (move_uploaded_file($_FILES["lastexampass"]["tmp_name"], $target_file)) {
		$msg2 = "The file " . basename($_FILES["lastexampass"]["name"]) . " has been uploaded.";
	} else {
		$msg2 = "Sorry, there was an error uploading your file.";
	}
	$msg = saveExamCert($target_file);
}
function saveExamCert($image)
{
	$msg = "";
	require 'connect.php';
	$sqlInsertExamCert = "UPDATE `student_info` SET `last_exam_marksmemo`='$image' WHERE sid='$_SESSION[userid]'";

	$result6 = mysqli_query($con, $sqlInsertExamCert);

	if ($result6 == 1) {
		$msg = "Marks Memo Uploaded Sucessfully";
	}
	return $msg;
}
if (isset($_POST['submit7'])) {

	$image = addslashes($_FILES['adhar']['tmp_name']);
	$name = addslashes($_FILES['adhar']['name']);
	$image = file_get_contents($image);
	$imageFileType = strtolower(pathinfo($_FILES["adhar"]["name"], PATHINFO_EXTENSION));
	$target_file = "upload/adhar_" . time() . '.' . $imageFileType;
	if (move_uploaded_file($_FILES["adhar"]["tmp_name"], $target_file)) {
		$msg2 = "The file " . basename($_FILES["adhar"]["name"]) . " has been uploaded.";
	} else {
		$msg2 = "Sorry, there was an error uploading your file.";
	}
	$msg = saveAdhar($target_file);
}
function saveAdhar($image)
{
	$msg = "";
	require 'connect.php';
	$sqlInsertAdhar = "UPDATE `student_info` SET `adhar`='$image' WHERE sid='$_SESSION[userid]'";

	$result7 = mysqli_query($con, $sqlInsertAdhar);

	if ($result7 == 1) {
		$msg = "Adhar Uploaded Sucessfully";
	}
	return $msg;
}
if (isset($_POST['submit8'])) {

	$image = addslashes($_FILES['leavingcert']['tmp_name']);
	$name = addslashes($_FILES['leavingcert']['name']);
	$image = file_get_contents($image);
	$imageFileType = strtolower(pathinfo($_FILES["leavingcert"]["name"], PATHINFO_EXTENSION));
	$target_file = "upload/leavingcert_" . time() . '.' . $imageFileType;
	if (move_uploaded_file($_FILES["leavingcert"]["tmp_name"], $target_file)) {
		$msg2 = "The file " . basename($_FILES["leavingcert"]["name"]) . " has been uploaded.";
	} else {
		$msg2 = "Sorry, there was an error uploading your file.";
	}
	$msg = saveLeavingCert($target_file);
}
function saveLeavingCert($image)
{
	$msg = "";
	require 'connect.php';
	$sqlInsertLeavingCert = "UPDATE `student_info` SET `leaving_cert`='$image' WHERE sid='$_SESSION[userid]'";

	$result8 = mysqli_query($con, $sqlInsertLeavingCert);

	if ($result8 == 1) {
		$msg = "Leaving Certificate Uploaded Sucessfully";
	}
	return $msg;
}

if (isset($_POST['submit'])) {

	header('location: finalsubmission.php');
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
					Dashboard
				</div>
				<div class="panel-body">
					<div class="msgimg">
						<?php if (!$pic) {  ?>
							<img src="./index_files/img_avatar.png" style=" width: 100px;">
						<?php } else {  ?>
							<img src="<?php echo $pic; ?>" style=" width: 100px;">
						<?php } ?>
					</div>
					<ul class="nav nav-pills nav-stacked" role="tablist" style="padding-top: 10px;">
						<li><a href="userindex.php">Home</a></li>
						<li class="active"><a href="counsellstage1.php">Apply for Counselling</a></li>
						<li><a href="checkstatus.php">Check Status</a></li>
						<li><a href="feesubmission.php">Fee Submission</a></li>
						<li><a href="">Change Password</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading"> Documents Upload - Step 6</div>
				<div class="panel-body">
					<span style="color: green; font-weight: bold;"><?php echo $msg2; ?></span>
					<span style="color: green; font-weight: bold;"><?php echo $msg; ?></span>
					<form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<div class="col-sm-12">
								<label>Picture <span style="color: red; font-weight: bold;">*</span></label>
								<input type="file" class="form-control" name="pic" id="pic">
								<br>
								<input type="submit" name="submit1" value="Upload" class="btn btn-success"><br>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<label>Signature <span style="color: red; font-weight: bold;">*</span></label>
								<input type="file" class="form-control" name="sign" id="sign">
								<br>
								<input type="submit" name="submit2" value="Upload" class="btn btn-success">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<label>Residential Certificate <span style="color: red; font-weight: bold;">*</span></label>
								<input type="file" class="form-control" name="residential" id="res">
								<br>
								<input type="submit" name="submit3" value="Upload" class="btn btn-success">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<label>Caste Certificate <span style="color: red; font-weight: bold;">*</span></label>
								<input type="file" class="form-control" name="caste" id="cast">
								<br>
								<input type="submit" name="submit4" value="Upload" class="btn btn-success">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<label>Income Certificate <span style="color: red; font-weight: bold;">*</span></label>
								<input type="file" value="" class="form-control" name="income" id="income">
								<br>
								<input type="submit" name="submit5" value="Upload" class="btn btn-success">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<label>Last Exam Passed Marksheet <span style="color: red; font-weight: bold;">*</span></label>
								<input type="file" value="" class="form-control" name="lastexampass" id="marks">
								<br>
								<input type="submit" name="submit6" value="Upload" class="btn btn-success">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<label>Adhar <span style="color: red; font-weight: bold;">*</span></label>
								<input type="file" value="" class="form-control" name="adhar" id="adhar">
								<br>
								<input type="submit" name="submit7" value="Upload" class="btn btn-success">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<label>Leaving Certificate <span style="color: red; font-weight: bold;">*</span></label>
								<input type="file" value="" class="form-control" name="leavingcert" id="lcer">
								<br>
								<input type="submit" name="submit8" value="Upload" class="btn btn-success">
							</div>
						</div>
						<div class="form-group">
							<div class="col-xs-12 col-sm-10">
								<button type="submit" name="submit" class="btn btn-primary" onclick="docValidate()">Save & Next</button>
							</div>
						</div>
						<span><?php echo $finalMsg; ?></span>
					</form>

				</div>

			</div>

		</div>
	</div>
</div>
<?php require_once "includes/foot.footer.php" ?>