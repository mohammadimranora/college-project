<?php
require_once "../common/connect.php";
session_start();
if (!isset($_SESSION['userid'])) {
	header('location: index.php');
}
$pic = $_SESSION["UserData"]["pic"];
$payment_enable = $payment_status = $paystatus = $fee = "";
$sql2 = "select fee from course_info where course_id='$_SESSION[courseid]'";
$result2 = mysqli_query($con, $sql2);
$row2 = mysqli_fetch_assoc($result2);
$fee = $row2["fee"];
if (isset($_POST['pay'])) {

	$sql = "select payment_enable from allotment where sid='$_SESSION[userid]'";
	$sql1 = "select payment_status from payment_info where sid='$_SESSION[userid]'";

	$result = mysqli_query($con, $sql);
	$result1 = mysqli_query($con, $sql1);


	$row = mysqli_fetch_assoc($result);
	$row1 = mysqli_fetch_assoc($result1);



	$payment_enable = $row["payment_enable"];
	$payment_status = $row1["payment_status"];

	if ($payment_enable == '1') {

		if ($payment_status == NULL) {

			header('location: https://www.instamojo.com/@imrance07');
		} else {
			$paystatus = "You have already paid the fee.";
		}
	} else {
		$paystatus = "Your Payment option has not been activated. Contact Central Admission Cell.";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<?php require_once "../includes/static.header.php" ?>
<?php require_once "../includes/menu.header.php" ?>
<?php require_once "../includes/user.navbar.header.php" ?>
<div class="container MainContainer">
	<div class="row">
		<?php require_once "../includes/student.side-bar.php" ?>
		<div class="col-sm-6 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading"> Fee Submission</div>
				<div class="panel-body">
					<form action="" class="form-horizontal" method="post" accept-charset="utf-8">
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" value="<?php echo $_SESSION['userid']; ?>" class="form-control" placeholder="Temp ID" readonly="" name="id">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" value="<?php echo $_SESSION['username']; ?>" readonly="" class="form-control" placeholder="Name" name="name">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" value="<?php echo $_SESSION['courseid']; ?>" readonly="" class="form-control" placeholder="Course" name="course">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="number" value="<?php echo $fee; ?>" readonly="" class="form-control" placeholder="Fee Amount" name="famount">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-5 col-sm-7">
								<button type="submit" name="pay" class="btn btn-primary">Pay</a></button>
							</div>
						</div>
					</form>
					<span style="color: red; font-weight: bold;"><?php echo $paystatus; ?></span>
				</div>

			</div>

		</div>
	</div>
</div>
<?php require_once "../includes/foot.footer.php" ?>