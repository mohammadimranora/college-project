<?php
require 'connect.php';
session_start();
if (!isset($_SESSION['adminid'])) {
	header('location:logout.php');
}
$sid = $_SESSION['sid'];

$nameDB = "SELECT  `name` FROM `student_info` WHERE sid='$sid'";
$dataAdmission = "SELECT `eno`, `center`, `course`, `date_of_admission` FROM `admission` WHERE sid='$sid'";

$result1 = mysqli_query($con, $nameDB);
$datarow1 = mysqli_fetch_array($result1);

$result2 = mysqli_query($con, $dataAdmission);
$datarow2 = mysqli_fetch_array($result2);

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title> Admission Letter | OCS</title>
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

			<div class="col-sm-12 col-xs-12" id="PrintArea">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<center>Admission Letter</center>
					</div>
					<table class="table table-responsive" style="font-size: 16px">
						<tr>
							<th><span>
									<center>Admission Confirmation Letter</center>
								</span></th>
						</tr>
						<tr>
							<td style="font-weight: bold;">Date:&nbsp<?php $date = date("d/m/Y");
																		echo $date ?></td>
						</tr>
						<tr>
							<td>Central Admission Cell</td>
						</tr>
						<tr>
							<td>Hyderabad-500032</td>
						</tr>
						<tr>
							<td>Dear Mr/Ms&nbsp <span style="color: black; font-weight: bold; text-transform: uppercase;"><?php echo $datarow1[0]; ?></span></td>
						</tr>
						<tr>
							<td>
								<p style="text-align: justify;">
									<br>
									I am pleased to inform you that you have been admitted to the<span style="color: blue; font-weight: bold; text-transform: uppercase;"> <?php echo $datarow2[2]; ?></span> program at <span style="color: blue; font-weight: bold; text-transform: uppercase;"> <?php echo $datarow2[1]; ?></span> for the <span style="color: blue; font-weight: bold; text-transform: uppercase;"> <?php echo date("Y");
																																																																																																						echo "-";
																																																																																																						echo date("y") + 1; ?></span> academic year beginning August <?php $date = date("Y");
																																																																																																																						echo $date ?>. Your enrollment no is <span style="color: blue; font-weight: bold; text-transform: uppercase;"> <?php echo $datarow2[0]; ?></span> and Admission date is <span style="color: blue; font-weight: bold; text-transform: uppercase;"> <?php echo $datarow2[3]; ?></span> <br><br>

									Admission to our program is very competitive and we scrutinize each application carefully. We believe that a stimulating, intellectual discussion between students and faculty is a necessary ingredient of a successful program. We have admitted you because we think that you will be able to make an important contribution to this research dialogue. In turn, we hope that the personal supervision we offer, together with the collegial atmosphere of our students, will combine to make your stay here very rewarding - personally, academically and professionally.<br><br><br><br><br><br><br>
								</p>
							</td>
						</tr>
						<tr>
							<td>Central Admission Cell</td>
						</tr>
						<tr>
							<td>Central Admission Counsellor</td>
						</tr>
						<tr>
							<td>Phone: +91-9160659149</td>
						</tr>
					</table>

				</div>
			</div>
		</div>
		<center>
			<form action="" method="post">
				<div class="form-group">
					<div class="col-xs-12 col-sm-10">
						<button class="btn btn-primary" name="print" onclick="printDiv('PrintArea');">Print <i class="fa fa-print"></i></button>
						<button class="btn btn-primary" onclick="closeMe()">Close this Window</button>

					</div>
				</div>
			</form>
		</center>
	</div>
	</div>
	<?php require_once "includes/foot.footer.php" ?>