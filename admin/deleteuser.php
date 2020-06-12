<?php
require '../connect.php';
session_start();
if (!isset($_SESSION['adminid'])) {
	$URL = url() . "/index.php";
	header("location: $URL ");
}
$userid = $type = $errorMsg = $sucessMsg = "";
$isData = 0;
if (isset($_POST['fetchdata'])) {
	$userid = $_POST['userid'];
	$type = $_POST['type'];
	$sqlcheck = "select *from user where user_id='$userid' AND type='$type'";
	$result = mysqli_query($con, $sqlcheck);
	$row = mysqli_fetch_array($result);
	if (mysqli_num_rows($result) > 0) {
		$isData = 1;
		$_SESSION['isData'] = $isData;
	} else {
		$errorMsg = "Invalid User";
	}
}
if (isset($_POST['delete'])) {
	$userid = $_POST['userid'];
	$type = $_POST['type'];
	if ($_SESSION['isData'] == 1) {
		$delete = "DELETE FROM `user` WHERE user_id='$userid' AND type='$type'";
		$status = mysqli_query($con, $delete);
		if ($status == 1) {
			$sucessMsg = "User was deleted";
			$_SESSION['isData'] = 0;
		} else {
			$errorMsg = "User hasn't been deleted";
		}
	} else {
		$errorMsg = "User isn't valid";
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
				<div class="panel-heading">Delete User</div>
				<div class="panel-body">
					<span style="color: red; font-weight: bold; text-transform: capitalize;"><?php echo $errorMsg; ?></span>
					<span style="color: green; font-weight: bold; text-transform: capitalize;"><?php echo $sucessMsg; ?></span>
					<form action="" class="form-horizontal" method="post" accept-charset="utf-8">
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" value="" id="userid" class="form-control" required="" name="userid" placeholder="User ID">
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
								<button type="submit" class="btn btn-primary" name="fetchdata" onclick="deleteuserValid()">Get Details</button>
								<button type="submit" class="btn btn-primary" name="delete" onclick="deleteuserValid()">Delete</button>
								<button type="reset" class="btn btn-primary">Clear</button>
							</div>
						</div>
					</form>
					<div class="panel panel-primary">
						<div class="panel-body" style="color: green; font-weight: bold; text-transform: uppercase;">
							<?php
							if ($isData == 1) {

								echo "User ID : $row[0] &nbsp Name : $row[1]<br><br>E-Mail : $row[3] &nbsp Mobile No : $row[4]<br><br>Type : $row[5]";
							}

							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php require_once "../includes/foot.footer.php" ?>