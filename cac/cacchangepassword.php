<?php
require 'connect.php';
session_start();
if (!isset($_SESSION['adminid'])) {
	header('location:logout.php');
}
$oldpwd = $newpwd = $cnewpwd = $status = $msgchg = "";
if (isset($_POST['change'])) {
	$oldpwd = $_POST['oldpwd'];
	$newpwd = $_POST['newpwd'];
	$cnewpwd = $_POST['cnewpwd'];
	$oldPass = "select password from `user` where user_id='$_SESSION[userid]'";
	$chgPwd = "UPDATE `user` SET `password`='$newpwd' WHERE user_id='$_SESSION[userid]'";
	$result = mysqli_query($con, $oldPass);
	$row = mysqli_fetch_assoc($result);
	if (strtolower($row["password"]) == $oldpwd) {
		if ($newpwd == $cnewpwd) {
			$status = mysqli_query($con, $chgPwd);
			if ($status == 1) {
				$msgchg = "Your password has been chnaged sucessfully.";
			}
		} else {
			$msgchg = "New Password and Confirm New Password is not same.";
		}
	} else {
		$msgchg = "Old Password that you have entered, is not correct.";
	}
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
					Dashboard- CAC
				</div>
				<div class="panel-body">
					<div class="msgimg">
						<img src="./static/img_avatar.png" style=" width: 100px;">

					</div>
					<ul class="nav nav-pills nav-stacked" role="tablist" style="padding-top: 10px; display: block;">
						<li><a href="cacindex.php">Home</a></li>
						<li><a href="allotment.php">Allot Seat & Center</a></li>
						<li><a href="verify.php">Verify Document</a></li>
						<li><a href="enrollmentno.php">Generate Enrollment No</a></li>
						<li><a href="stats.php">Generate Stats</a></li>
						<li><a href="search.php">Search Student</a></li>
						<li><a href="report.php" target="_blanck">Generate Report</a></li>
						<li><a href="enablepay.php">Enable Payment</a></li>
						<li class="active"><a href="cacchangepassword.php">Change Password</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</div>
			</div>

		</div>
		<div class="col-sm-6 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading">Change Password</div>
				<div class="panel-body">
					<span style="color: green; font-weight: bold;"><?php echo $msgchg; ?></span>
					<form action="" class="form-horizontal" method="post" accept-charset="utf-8">
						<div class="form-group">
							<div class="col-sm-12">
								<input type="password" id="oldpwd" class="form-control" placeholder="Enter Your Old Password" required name="oldpwd" autocomplete="off">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="password" id="newpwd" class="form-control" placeholder="Enter Your New Password" required name="newpwd" autocomplete="off">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="password" value="" class="form-control" id="cnewpwd" placeholder="Confirm Your New Password" required name="cnewpwd" autocomplete="off">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-5 col-sm-7">
								<button type="submit" class="btn btn-primary" name="change" onclick="javascript: return changeValidate(this);">Change</button>
								<button type="reset" class="btn btn-primary"> Clear</button>
							</div>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>
</div>
<?php require_once "includes/foot.footer.php" ?>