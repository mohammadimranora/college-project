<?php
session_start();
if (!isset($_SESSION['adminid'])) {
	header('location:logout.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title> Complaint Panel | OCS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./static/bootstrap.min.css">
	<link rel="stylesheet" href="./static/custom.css">
	<script src="./static/jquery.min.js.download"></script>
	<script src="./static/bootstrap.min.js.download"></script>
	<link rel="stylesheet" type="text/css" href="./static/custom1.css">
	<script type="text/javascript">
		function printDiv(divName) {
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;

			document.body.innerHTML = printContents;

			window.print();

			document.body.innerHTML = originalContents;
		}
	</script>
</head>

<body>
	<?php require_once "includes/menu.header.php" ?>
	<?php require_once "includes/user.navbar.header.php" ?>
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
							<li><a href="updateuser.php">Update User</a></li>
							<li><a href="deleteuser.php">Delete User</a></li>
							<li><a href="grievanceprint.php">Grievance</a></li>
							<li class="active"><a href="complaintprint.php">Complaint</a></li>
							<li><a href="openadmission.php">Open Admission</a></li>
							<li><a href="closeadmission.php">Close Admission</a></li>
							<li><a href="adminchangepassword.php">Change Password</a></li>
							<li><a href="logout.php">Logout</a></li>
						</ul>
					</div>
				</div>

			</div>
			<div class="col-sm-9 col-xs-12">
				<div class="panel panel-primary" id="PrintArea">
					<div class="panel-heading">Complaint</div>
					<div class="panel-body">
						<form action="" class="form-horizontal" method="post" accept-charset="utf-8">
							<div class="col-xs-12 col-sm-12">
								<center><b>Complaint</b></center>
								<table class="table table-responsive" style="text-transform: capitalize;">
									<thead>
										<th>Name</th>
										<th>E-Mail</th>
										<th>Mobile No.</th>
										<th>Problem Type</th>
										<th>Problem Description</th>
									</thead>
									<?php
									require 'connect.php';
									$queries = "SELECT * FROM `support`";
									$result = mysqli_query($con, $queries);

									while ($row = mysqli_fetch_array($result)) {

										echo "<tr>
  													<td>$row[0]</td>
  													<td>$row[1]</td>
  													<td>$row[2]</td>
  													<td>$row[3]</td>
  													<td>$row[4]</td>
  												</tr>";
									}
									?>
								</table>
							</div>
							<div class="form-group">
								<div class="col-xs-12 col-sm-10">
									<button class="btn btn-primary" name="print" onclick="printDiv('PrintArea');">Print <i class="fa fa-print"></i></button>

								</div>
							</div>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	</div>
	<?php require_once "includes/foot.footer.php" ?>