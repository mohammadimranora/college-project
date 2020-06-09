<?php
require 'connect.php';
session_start();
if (!isset($_SESSION['adminid'])) {
	header('location:logout.php');
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
<?php require_once "includes/static.header.php" ?>
<?php require_once "includes/menu.header.php" ?>
<?php require_once "includes/user.navbar.header.php" ?>
<div>
	<div class="container">
		<div class="row">
			<div class="col-md-2 col-xs-12">
				<a href="adminindex.php">
					<img src="./static/ocslogo.png" class="img-responsive classLogo"></a>
			</div>

			<div class="col-md-7 col-xs-12" style="padding-top: 8px;color: #4444a9;">
				<div class="col-md-7 col-xs-12 hidden-xs">
					<span style="
				    font-size: 20px;
				    font-weight: bold;
				    line-height: 45px; color: #5f4c4c;">
						ऑनलाइन काउंसलिंग सिस्टम</span>
				</div>
				<div class="col-md-5 col-xs-12">

					<span class="UrduText" style=" font-size: 20px;font-weight: bold;text-align:right; color: #5f4c4c">
						آن لائن کوسللنگ سسٹم </span>

				</div>
				<br>
				<div class="col-md-12 col-xs-12 ">

					<span class="MANUUEngText" style="color: #5f4c4c;">Online Counselling System </span>
				</div>
			</div>
			<div class="col-md-3 hidden-xs" style="color: #5f4c4c;text-align: right;font-weight: bold;">
				<br>Call Us : +91-9160659149
				<br>Mail Us : queries@ocs.com
			</div>
		</div>
	</div>
</div>

<nav class="navbar navbar-default" role="navigation" style="background: #5f4c4c;">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
	</div>
	<div class="navbar-collapse collapse">
		<div class="container">
			<ul class="headerNav nav navbar-nav " style=" float: right;">
				<li class=""><a>Hi...<?php echo $_SESSION['username']; ?></a></li>
				<li class=""><a href="logout.php">Logout</a></li>

			</ul>
		</div>
	</div>
</nav>
<div class="container MainContainer">
	<div class="row">
		<div class="col-sm-3 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					Dashboard- Admin
				</div>
				<div class="panel-body">
					<div class="msgimg">
						<img src="./static/img_avatar.png" style=" width: 100px;">

					</div>
					<ul class="nav nav-pills nav-stacked" role="tablist" style="padding-top: 10px; display: block;">
						<li><a href="adminindex.php">Home</a></li>
						<li><a href="createuser.php">Create User</a></li>
						<li class="active"><a href="updateuser.php">Update User</a></li>
						<li><a href="deleteuser.php">Delete User</a></li>
						<li><a href="grievanceprint.php">Grievance</a></li>
						<li><a href="complaintprint.php">Complaint</a></li>
						<li><a href="openadmission.php">Open Admission</a></li>
						<li><a href="closeadmission.php">Close Admission</a></li>
						<li><a href="adminchangepassword.php">Change Password</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</div>
			</div>

		</div>
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
<?php require_once "includes/foot.footer.php" ?>