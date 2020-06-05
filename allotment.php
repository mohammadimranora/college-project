<?php
require 'connect.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

session_start();
if (!isset($_SESSION['adminid'])) {
	header('location:logout.php');
}
$sid = $course = $center = $date = "";
$msg = $name = $email = $mailSent = "";

if (isset($_POST['allot'])) {

	$sid = $_POST['id'];
	$center = $_POST['center'];
	$course = $_POST['course'];
	$date = $_POST['date'];

	$CheckSid = "SELECT `sid`, `status` FROM `counsell_status` WHERE sid='$sid'";
	$CheckSid1 = mysqli_query($con, $CheckSid);
	$Datarow = mysqli_fetch_array($CheckSid1);

	if ($Datarow[0] == $sid) {

		if ($Datarow[1] == 'alloted') {

			$msg = "Already Center and Seat Alloted.";
		} else {
			$sqlInsert = "INSERT INTO `allotment`(`sid`, `center_alloted`, `course_alloted`, `Reporting`) VALUES ('$sid','$center','$course','$date')";
			$SqlUpdate = "UPDATE `counsell_status` SET `status`='alloted' WHERE sid='$sid'";

			$SqlFetch = "SELECT `name`, `mail` FROM `student_info` WHERE sid='$sid'";

			$InsertStatus = mysqli_query($con, $sqlInsert);
			$UpdateStatus = mysqli_query($con, $SqlUpdate);
			$Fetch = mysqli_query($con, $SqlFetch);
			$row = mysqli_fetch_array($Fetch);

			if ($InsertStatus == 1) {

				if ($UpdateStatus == 1) {

					$msg = "Seat and Center has been alloted";

					$name = $row[0];
					$email = clean_data($row[1]);

					$bodypart = '<strong> Congratulations ' . $name . '<br>You have been alloted  course and center . Excel yourself.<br>Your Counselling and Allotment Details are here<br>Course:' . $course . '<br>Center:' . $center . '<br>Date of Reporting:' . $date . '<br><br><br>Central Admission Cell';


					$mail = new PHPMailer(true);                            // Passing `true` enables exceptions
					try {
						//Server settings
						// Enable verbose debug output
						$mail->isSMTP();                                // Set mailer to use SMTP
						$mail->Host = 'smtp.gmail.com';  				// Specify main and backup SMTP servers
						$mail->SMTPAuth = true;                         // Enable SMTP authentication
						$mail->Username = 'helpatocs@gmail.com';        // SMTP username
						$mail->Password = 'ocs@manuu2017';              // SMTP password
						$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
						$mail->Port = 587;                          // TCP port to connect to

						//Recipients
						$mail->setFrom('helpatocs@gmail.com', 'Central Admission Cell');
						$mail->addAddress($email, $name);     // Add a recipient

						//Content
						$mail->isHTML(true);                                  // Set email format to HTML
						$mail->Subject = 'Admission Confirmation';
						$mail->Body = $bodypart;

						$mail->send();
						$mailSent = 'Allotment Information has been sent to Student';
					} catch (Exception $e) {
						$mailSent = 'Allotment Mail could not be sent';
					}
				}
			}
		}
	} else {
		$msg = "Student ID isn't valid, Please enter a valid ID or May be Student hasn't submitted Counselling Application";
	}
}
function clean_data($data)
{
	$data = trim($data);
	$data = htmlspecialchars($data);
	$data = stripcslashes($data);
	return $data;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title> Allotment Seat & Center | OCS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./index_files/bootstrap.min.css">
	<link rel="stylesheet" href="./index_files/custom.css">
	<script src="./index_files/jquery.min.js.download"></script>
	<script src="./index_files/bootstrap.min.js.download"></script>
	<link rel="stylesheet" type="text/css" href="./index_files/custom1.css">
	<script type="text/javascript" src="./index_files/allotment.js"></script>
	<script type="text/javascript" src="./index_files/courseSelect.js"></script>
</head>

<body>
	<?php require_once "includes/menu.header.php" ?>
	<?php require_once "includes/user.navbar.header.php" ?>
	<div class="container MainContainer">
		<div class="row">
			<div class="col-sm-3 col-xs-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						Dashboard- CAC
					</div>
					<div class="panel-body">
						<div class="msgimg">
							<img src="./index_files/img_avatar.png" style=" width: 100px;">

						</div>
						<ul class="nav nav-pills nav-stacked" role="tablist" style="padding-top: 10px; display: block;">
							<li><a href="cacindex.php">Home</a></li>
							<li class="active"><a href="allotment.php">Allot Seat & Center</a></li>
							<li><a href="verify.php">Verify Document</a></li>
							<li><a href="enrollmentno.php">Generate Enrollment No</a></li>
							<li><a href="stats.php">Generate Stats</a></li>
							<li><a href="search.php">Search Student</a></li>
							<li><a href="report.php" target="_blanck">Generate Report</a></li>
							<li><a href="enablepay.php">Enable Payment</a></li>
							<li><a href="cacchangepassword.php">Change Password</a></li>
							<li><a href="logout.php">Logout</a></li>
						</ul>
					</div>
				</div>

			</div>
			<div class="col-sm-6 col-xs-12">
				<div class="panel panel-primary">
					<div class="panel-heading">Allotment</div>
					<div class="panel-body">
						<span style="color: green; font-weight: bold;"><?php echo $msg; ?></span><br>
						<span style="color: green; font-weight: bold;"><?php echo $mailSent; ?></span>
						<form action="" class="form-horizontal" method="post" accept-charset="utf-8">
							<div class="form-group">
								<div class="col-sm-12">
									<input type="text" value="" id="sid" class="form-control" placeholder="Enter Student ID" required name="id" autocomplete="off">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<select class="form-control" name="center" id="center" onchange="setStates();" required="">
										<option selected="" value="" disabled="">--Select Center--</option>
										<option value="HYDERABAD">HYDERABAD</option>
										<option value="BANGALORE">BANGALORE</option>
										<option value="DARBHANGA">DARBHANGA</option>
										<option value="KADAPA">KADAPA</option>
										<option value="CUTTACK">CUTTACK</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<select class="form-control" name="course" id="course" required="">
										<option selected="" value="-1" disabled="">--Select Course--</option>
										<option value="">--Please Select a Course</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input type="date" name="date" id="da" placeholder="Reporting Date" class="form-control" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input type="submit" name="allot" value="Allot" class="btn btn-primary" onclick="allowValid()">
									<input type="reset" class="btn btn-primary" value="Clear">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php require_once "includes/foot.footer.php" ?>