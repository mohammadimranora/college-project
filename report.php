<?php
require 'connect.php';
session_start();
if (!isset($_SESSION['adminid'])) {
	header('location:logout.php');
}
$FetchData = "SELECT * FROM `report`";
$resource = mysqli_query($con, $FetchData);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title> Generate Report | OCS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./index_files/bootstrap.min.css">
	<link rel="stylesheet" href="./index_files/custom.css">
	<script src="./index_files/jquery.min.js.download"></script>
	<script src="./index_files/bootstrap.min.js.download"></script>
	<link rel="stylesheet" type="text/css" href="./index_files/custom1.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript">
		function printDiv(divName) {
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;

			document.body.innerHTML = printContents;

			window.print();

			document.body.innerHTML = originalContents;
		}

		function closeMe() {
			window.opener = self;
			window.close();
		}
	</script>
</head>

<body>

<?php require_once "includes/menu.header.php" ?>
<?php require_once "includes/user.navbar.header.php" ?>
	<div class="container MainContainer">
		<div class="row">
			<div class="col-sm-12 col-xs-12">
				<div class="panel panel-primary">
					<div class="panel-heading">Report</div>
					<div class="panel-body" id="PrintArea">
						<table class="table table-hover">
							<thead>
								<th>SID</th>
								<th>NAME</th>
								<th>RANK</th>
								<th>CASTE</th>
								<th>KASHMIRI MIGRANT</th>
								<th>URDU</th>
								<th>SPORTS</th>
								<th>CENTER1</th>
								<th>COURSE1</th>
								<th>CENTER2</th>
								<th>COURSE2</th>
								<th>CENTER3</th>
								<th>COURSE3</th>
							</thead>
							<?php

							while ($row = mysqli_fetch_array($resource)) {

								$sid = $row[0];
								$name = $row[1];
								$rank = $row[2];
								$caste = $row[3];
								$kmigrant = $row[4];
								$urdu = $row[5];
								$sports = $row[6];
								$center1 = $row[7];
								$course1 = $row[8];
								$center2 = $row[9];
								$course2 = $row[10];
								$center3 = $row[11];
								$course3 = $row[12];



								echo "<tr>
								        <td>$sid</td>
								        <td>$name</td>
								        <td>$rank</td>
								        <td>$caste</d>
								        <td>$kmigrant</td>
								        <td>$urdu</td>
								        <td>$sports</td>
								        <td>$center1</td>
								        <td>$course1</td>
								        <td>$center2</td>
								        <td>$course2</td>
								        <td>$center3</td>
								        <td>$course3</td>
								      </tr>";
							}
							?>

						</table>
					</div>
				</div>
				<center>
					<form action="" method="post">
						<div class="form-group">
							<div class="col-xs-12 col-sm-10">
								<button class="btn btn-primary" name="print" onclick="printDiv('PrintArea');">Print Report <i class="fa fa-print"></i></button>
								<button class="btn btn-primary" onclick="closeMe()">Close this Window</button>

							</div>
						</div>
					</form>
				</center>
			</div>
		</div>
	</div>
	<?php require_once "includes/foot.footer.php" ?>