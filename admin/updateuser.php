<?php
require '../connect.php';
session_start();
if (!isset($_SESSION['adminid'])) {
	$URL = url()."/index.php";
	header("location: $URL ");
}

$userid = $username = $pwd1 = $umobile = $uemail = $actype = $errorMsg = "";
if (isset($_POST['update'])) {

	$userid = $_POST['userid'];
	$username = $_POST['uname'];
	$pwd1 = $_POST['password1'];
	$umobile = $_POST['umobile'];
	$uemail = $_POST['uemail'];
	$actype = $_POST['type'];

	$checkDB = "select *from user where user_id='$userid'";

	$result = mysqli_query($con, $checkDB);
	if (mysqli_num_rows($result) < 0) {

		$errorMsg = "User isn't valid. Please enter correct User Id";
	} else {
		$updateUser = "UPDATE `user` SET `name`='$username',`password`='$pwd1',`email`='$uemail',`mobile_no`=
		'$umobile',`type`='$actype' WHERE user_id='$userid'";
		$UpdateStatus = mysqli_query($con, $updateUser);
		if ($UpdateStatus == 1) {

			$errorMsg = "User information has been updated";
		} else {
			$errorMsg = "User information hasn't been updated";
		}
	}
}

?>
<?php require_once "../includes/static.header.php" ?>
<?php require_once "../includes/menu.header.php" ?>
<?php require_once "../includes/user.navbar.header.php" ?>
<div class="container MainContainer">
	<div class="row">
		<?php require_once "../includes/admin.side-bar.php"; ?>
		<div class="col-sm-6 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading">Update User</div>
				<div class="panel-body">
					<div class="panel panel-primary">
						<div class="panel-body" style="color: green; font-weight: bold;">
							<ul>
								<li>While updating user details, Make sure you have entered correct User Id</li>
								<li>Input all information as it was earlier entered and change where you update.</li>
								<li>On Sucessful update, You will get message.</li>
							</ul>

						</div>

					</div>
					<span style="color: green; font-weight: bold;"><?php echo $errorMsg; ?></span>
					<form action="" class="form-horizontal" method="post" accept-charset="utf-8">
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" value="" id="userid" class="form-control" required="" name="userid" placeholder="User ID">
							</div>
						</div>
						<span></span>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" id="uname" class="form-control" name="uname" placeholder="User Name" required="">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="Password" id="password1" name="password1" required="" placeholder="Password" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" id="umobile" name="umobile" required="" placeholder="Enter user Mobile Number" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="email" id="uemail" name="uemail" required="" placeholder="Enter user Email Number" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<select class="form-control" id="type" name="type" required="">
									<option value="">--Select Account Type--</option>
									<option value="dac">DAC</option>
									<option value="cac">CAC</option>
									<option value="admin">Admin</option>
								</select>
							</div>
						</div>
						<br>
						<div class="form-group">
							<div class="col-xs-12 col-sm-10">
								<button type="submit" class="btn btn-primary" name="update" onclick="updateuserValid()">Update</button>
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