<?php
require '../connect.php';
session_start();
if (!isset($_SESSION['adminid'])) {
	$URL = url()."/index.php";
	header("location: $URL ");
}
$userid = $username = $pwd1 = $pwd2 = $umobile = $uemail = $actype = $errorMsg = "";
if (isset($_POST['create'])) {

	$userid = $_POST['userid'];
	$username = $_POST['uname'];
	$pwd1 = $_POST['password1'];
	$pwd2 = $_POST['password2'];
	$umobile = $_POST['umobile'];
	$uemail = $_POST['uemail'];
	$actype = $_POST['type'];

	$checkDB = "select *from user where user_id='$userid'";

	$result = mysqli_query($con, $checkDB);
	$row = mysqli_fetch_array($result);

	if ($row[0] == $userid) {

		$errorMsg = "User ID Already Existing";
	} else {
		if ($row[3] == $uemail) {

			$errorMsg = "E-mail is Already Existing";
		} else {
			if ($pwd1 == $pwd2) {

				$createUser = "INSERT INTO `user`(`user_id`, `name`, `password`, `email`, `mobile_no`, `type`) VALUES ('$userid','$username','$pwd1','$uemail','$umobile','$actype')";
				$InsertStatus = mysqli_query($con, $createUser);
				if ($InsertStatus == 1) {

					$errorMsg = "User has been created";
				} else {
					$errorMsg = "User wasn't created. Something went wrong";
				}
			} else {
				$errorMsg = "Both password must be same";
			}
		}
	}
}

?>
<?php require_once "../includes/static.header.php" ?>
<?php require_once "../includes/menu.header.php" ?>
<?php require_once "../includes/user.navbar.header.php" ?>
<div class="container MainContainer">
	<div class="row">
		<?php require_once "../includes/admin.side-bar.php" ?>
		<div class="col-sm-6 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading">Create User</div>
				<div class="panel-body">
					<span style="color: green; font-weight: bold;"><?php echo $errorMsg; ?></span>
					<form action="" class="form-horizontal" method="post" accept-charset="utf-8">
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" value="" id="userid" class="form-control" required="" name="userid" placeholder="User ID">
							</div>
						</div>
						<span></span>
						<div class="panel panel-primary">
							<div class="panel-body">
								<ul style="font-weight: bold; ">
									<li>Administrative Username must be like as mentioned below</li>
									<ul>
										<li>Starting three character should user type</li>
										<ul>
											<li>Departmental Admission Counsellor : dac</li>
											<li>Central Admission Counsellor : cac</li>
											<li>Administrative User: adm</li>
										</ul>
										<li>Next six character must be academic session like 201819</li>
										<li>Last one character would be user index like 1 in DAC2018191</li>
									</ul>
								</ul>
							</div>

						</div>
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
								<input type="Password" id="password2" name="password2" required="" placeholder="Confirm Password" class="form-control">
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
								<button type="submit" class="btn btn-primary" name="create" onclick="createValidate()">Create</button>
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