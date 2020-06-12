<?php
require '../connect.php';
session_start();
if (!isset($_SESSION['adminid'])) {
	$URL = url()."/index.php";
	header("location: $URL ");
}
$msg = $msgToDisplay = "";
if (isset($_POST['close'])) {

	$msg = $_POST['msg'];

	$checkStatus = "Select status from isadmissionopen";
	$result = mysqli_query($con, $checkStatus);
	$row = mysqli_fetch_array($result);

	if ($row[0] == 0) {

		$msgToDisplay = "Counselling is Already Closed.";
	} else {
		$openAdmission = "UPDATE `isadmissionopen` SET `msg`='$msg',`status`='0'";
		$status = mysqli_query($con, $openAdmission);
		if ($status == 1) {

			$msgToDisplay = "Now Counselling is Closed";
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
				<div class="panel-heading">Close Admission</div>
				<div class="panel-body">
					<span style="color: green; font-weight: bold;"><?php echo $msgToDisplay; ?></span>
					<form action="" class="form-horizontal" method="post" accept-charset="utf-8">
						<div class="form-group">
							<div class="col-sm-12">
								<label>Message</label>
								<br>
								<textarea name="msg" class="form-control" rows="3" cols="10" required="" autofocus="" style="text-transform: capitalize;"></textarea>
							</div>
						</div>
						<br>
						<div class="form-group">
							<div class="col-xs-12 col-sm-10">
								<button type="submit" class="btn btn-primary" name="close">Close Admission</button>
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