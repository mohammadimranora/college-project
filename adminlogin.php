<?php
require 'connect.php';
session_start();
$errLogin = "";

if (isset($_POST['login'])) {

	$userid = clean_data($_POST['userid']);
	$pass = clean_data($_POST['password']);
	$captcha = clean_data($_POST['captcha']);

	$sql = "select *from user where user_id='$userid' AND password='$pass'";
	$result = mysqli_query($con, $sql);
	if (mysqli_num_rows($result) == 1) {

		if ($captcha == $_SESSION['code']) {

			$_SESSION['adminid'] = $userid;
			$row = mysqli_fetch_array($result);
			$_SESSION['username'] = $row[1];
			$_SESSION['type'] = $row[5];

			if ($row['type'] == 'cac' || $row['type'] == 'Cac' || $row['type'] == 'CAC') {

				header('location: cacindex.php');
			} elseif ($row['type'] == 'dac' || $row['type'] == 'Dac' || $row['type'] == 'DAC') {

				header('location: dacindex.php');
			} elseif ($row['type'] == 'admin' || $row['type'] == 'Admin' || $row['type'] == 'ADMIN') {

				header('location: adminindex.php');
			}
		} else {
			$errLogin = "Invalid Captcha";
		}
	} else {
		$errLogin = "Either Your User ID Or Password is wrong";
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
	<title>Administrative Login | OCS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./static/bootstrap.min.css">
	<link rel="stylesheet" href="./static/custom.css">
	<script src="./static/jquery.min.js.download"></script>
	<script src="./static/bootstrap.min.js.download"></script>
	<link rel="stylesheet" type="text/css" href="./static/custom1.css">
	<script type="text/javascript">
		function loginValidate() {
			var id = document.getElementById("userid").value;
			var pass = document.getElementById("password").value;
			var captcha = document.getElementById("captcha").value;

			if (id == "" || id == null) {
				alert("Please Enter your User ID");
				userid.focus();
				return false;
			}
			if (pass == "" || pass == null) {
				alert("Please Enter your Password");
				password.focus();
				return false;
			}
			if (captcha == "" || captcha == null) {
				alert("Please Enter Captcha");
				captcha.focus();
				return false;
			}
		}
	</script>
</head>

<body>

	<?php require_once "includes/menu.header.php" ?>
	<?php require_once "includes/navbar.header.php" ?>
	<div class="container MainContainer">
		<div class="row">
			<div class="col-sm-3">

			</div>
			<div class="col-sm-6">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h5>Administrative Login</h5>
					</div>
					<div class="panel-body">
						<span style="color: red; font-weight: bold;"><?php echo "$errLogin" ?></span>
						<form class="form-horizontal" method="post" accept-charset="utf-8" action="">
							<div class="form-group">
								<div class="col-sm-12">
									<input type="text" name="userid" autocomplete="off" id="userid" class="form-control" placeholder="User Id" required="">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input type="password" name="password" autocomplete="off" id="password" class="form-control" placeholder="Password" required="">
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
							<div class="form-group">
								<div class="col-sm-12">
									<button type="submit" name="login" value="login" class="btn btn-primary" onclick="loginValidate()">Login</button>
									<button type="reset" name="reset" class="btn btn-primary">Clear</button>

								</div>
							</div>


						</form>
					</div>
					<div class="panel-footer">
						<a href="adminforgetpassword.php">Forget Password ?</a>
					</div>
				</div>


			</div>
		</div>
	</div>

	<?php require_once "includes/foot.footer.php" ?>