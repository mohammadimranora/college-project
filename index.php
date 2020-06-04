<?php
require 'connect.php';
session_start();
$errLogin = $CounsellingStatus = "";
if (isset($_POST['login'])) {

	$userid = clean_data($_POST['user_id']);
	$pass = clean_data($_POST['password']);
	$captcha = clean_data($_POST['captcha']);
	$sql = "select *from student_login where sid='$userid' AND password='$pass'";
	$result = mysqli_query($con, $sql);
	if (mysqli_num_rows($result) == 1) {
		if ($captcha == $_SESSION['code']) {
			$_SESSION['userid'] = $userid;
			$sqlname = "select * from student_info where sid='$userid'";
			$run = mysqli_query($con, $sqlname);
			$row = mysqli_fetch_assoc($run);
			$row1 = mysqli_fetch_assoc($result);
			$_SESSION['username'] = $row["name"];
			$_SESSION['courseid'] = $row["courseid"];
			$_SESSION['UserData'] = $row;

			$resultmy = "SELECT `msg`, `status` FROM `isadmissionopen`";
			$rowStatus = mysqli_query($con, $resultmy);
			$datarow = mysqli_fetch_array($rowStatus);
			if ($datarow[1] == 1) {
				header('location: userindex.php');
			} else {
				$CounsellingStatus = $datarow[0];
			}
		} else {
			$errLogin = "Invalid Captcha";
		}
	} else {
		$errLogin = "Either Your User ID Or Password is Wrong";
	}
}
function clean_data($data)
{
	$data = trim($data);
	$data = htmlspecialchars($data);
	$data = stripcslashes($data);
	$data = strip_tags($data);
	return $data;
}
?>
<?php require_once "includes/static.header.php" ?>
<?php require_once "includes/menu.header.php" ?>
<?php require_once "includes/navbar.header.php" ?>
<div class="container MainContainer">
	<div class="row">
		<div class="col-sm-3">
			<div class="panel panel-primary">
				<div class="panel-heading">Counselling Updates</div>
				<div class="panel-body">
					<ul>
						<li><a href="#">Counselling Notification 2018 Here You can See Notification......</a></li>
						<li><a href="#">Counselling Notification 2018</a></li>
						<li><a href="#">Counselling Notification 2018</a></li>
						<li><a href="#">Counselling Notification 2018</a></li>
						<li><a href="#">Counselling Notification 2018</a></li>
						<li><a href="#">Counselling Notification 2018</a></li>
						<li><a href="#">Counselling Notification 2018</a></li>
						<li><a href="#">Counselling Notification 2018</a></li>
					</ul>
				</div>
			</div>
			<div class="panel panel-primary">
				<div class="panel-heading">Instructional Video</div>
				<div class="panel-body">
					<video src="./resources/instruction.mp4" width="100%" height="auto" controls></video>
				</div>

			</div>
		</div>
		<div class="col-sm-6">
			<div class="panel panel-primary">
				<div class="panel-body">
					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#">Instructions</a></li>
					</ul>
					<div class="tab-content">
						<div id="InstructionsEnglish" class="tab-pane fade in active">
							<p style=" font-weight: bold;    color: #3468b9;">
								Read the following Instructions before Filling the choices:
							</p>
							<ol>
								<li>To counsell yourself, you must be a qualified candidate. To login to this system. Use your <strong>Login ID</strong> and <strong>Password</strong> That you have been given at the time of application of entrance</li>

								<li>Once you login to this system, you will see your <strong>partial perosnal details.</strong> After that just <strong>follow the instruction</strong>.</li>

								<li>Once <strong>choices are locked. Can't be changed</strong>. Before final submit you <strong>review your choice option very carefully</strong>.</li>

								<li>In case you have lost/forgot your password, Please use&nbsp;Forgot Password&nbsp;link to retrieve password. <strong>New password</strong> will be sent to you on your registered email.</li>

								<li calss="style1">Be ready with these documents.</li>
								<ul>
									<li>Scanned copy of&nbsp;<strong>colored passport size Photo</strong> (3.5 x 4.5 cm) and <strong>Signature</strong>&nbsp;(3.5 x 1.5 cm) in JPG/JPEG format only. The file size of scanned photo should be less than 100KB and signature less than 50KB.
									<li> <strong>Certificates of last exam passed</strong>. Maximum size allowed 200KB</li>
									<li> <strong>Income certificate</strong>, issued by the Competent Authority. Maximum size allowed 200KB</li>
									<li> <strong>Domicile Certificate</strong> by issued by the Competent Authority. Maximum size allowed 200KB</li>
									<li><strong>Income Certificate</strong> by issued by the Competent Authority, If applicable. Maximum size allowed 200KB</li>
									<li>College/School/University <strong>leaving certificate</strong>. Maximum size allowed 200KB</li>
									<li><strong>Adhar card</strong>. Maximum size allowed 200KB</li>
								</ul>
							</ol>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="panel panel-primary">
				<div class="panel-heading">Applicant Login</div>
				<div class="panel-body">
					<form action="" class="form-horizontal" method="post" accept-charset="utf-8">
						<span style="color: red; font-weight: bold;"><?php echo "$errLogin" ?></span>
						<span style="color: red; font-weight: bold; text-transform: capitalize;"><?php echo $CounsellingStatus; ?></span>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" value="" class="form-control" required="" name="user_id" placeholder="Enter your ID" id="user_id" autocomplete="off">
								<span class="error"></span>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="password" class="form-control" name="password" placeholder="Enter Password" required="" id="password">
								<span class="error"><span></span></span>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" name="captcha" class="form-control" placeholder="Enter Captcha" required="" id="captcha" autocomplete="off">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<img src="captcha.php">
							</div>
						</div>
						<br>
						<div class="form-group">
							<div class="col-sm-offset-1 col-sm-10">
								<button type="submit" class="btn btn-primary" name="login">Login</button>
								<button type="reset" class="btn btn-primary">Clear</button>
							</div>
						</div>
					</form>
				</div>
				<div class="panel-footer"><small><a href="forgotpass.php">Forgot Password</a></small>
				</div>
			</div>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h6>Important Links</h6>
				</div>
				<div class="panel-body">
					<ul>
						<li><a href="http://www.manuu.ac.in/Eng-Php/index-english.php" target="_blank">MANUU Main Web</a></li>
						<li><a href="http://manuucoe.in/" target="_blank">MANUU COE</a></li>
						<li><a href="http://manuucoe.in/cit/" target="_blank">MANUU CIT</a></li>
						<li><a href="https://www.youtube.com/channel/UC8bmtIx3qQyHTnafF0uoUBA" target="_blank">MANUU IMC</a></li>
					</ul>

				</div>

			</div>
		</div>

	</div>
</div>
<?php require_once "includes/foot.footer.php" ?>