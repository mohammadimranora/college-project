<?php
require 'connect.php';
session_start();
if (!isset($_SESSION['userid'])) {
	header('location: index.php');
}
$pic = $_SESSION["UserData"]["pic"];
$exam_name1 = $board1 = $subjects1 = $yearpassing1 = $obtainedmarks1 = $totalmarks1 = $div1 = "";
$exam_name2 = $board2 = $subjects2 = $yearpassing2 = $obtainedmarks2 = $totalmarks2 = $div2 = "";
$Status1 = $Status2 = $msg = "";

if (isset($_POST['savenext'])) {
	if ($_POST['q1']) {

		$exam_name1 = $_POST['exam_name1'];
		$board1 = $_POST['board1'];
		$subjects1 = $_POST['subjects1'];
		$yearpassing1 = $_POST['yearpassing1'];
		$obtainedmarks1 = $_POST['obtainedmarks1'];
		$totalmarks1 = $_POST['totalmarks1'];
		$div1 = $_POST['div1'];
		$sqlInsert1 = "INSERT INTO `qualification`(`sid`, `exam_name`, `board_university`, `subject`, `passing_year`, `obtained_marks`, `total_marks`, `division`) VALUES ('$_SESSION[userid]','$exam_name1','$board1','$subjects1','$yearpassing1','$obtainedmarks1','$totalmarks1','$div1')";

		$Status1 = mysqli_query($con, $sqlInsert1);
		if ($_POST['q2']) {

			$exam_name2 = $_POST['exam_name2'];
			$board2 = $_POST['board2'];
			$subjects2 = $_POST['subjects2'];
			$yearpassing2 = $_POST['yearpassing2'];
			$obtainedmarks2 = $_POST['obtainedmarks2'];
			$totalmarks2 = $_POST['totalmarks2'];
			$div2 = $_POST['div2'];
			$sqlInsert2 = "INSERT INTO `qualification`(`sid`, `exam_name`, `board_university`, `subject`, `passing_year`, `obtained_marks`, `total_marks`, `division`) VALUES ('$_SESSION[userid]','$exam_name2','$board2','$subjects2','$yearpassing2','$obtainedmarks2','$totalmarks2','$div2')";

			$Status2 = mysqli_query($con, $sqlInsert2);
		}
	}
	if ($Status1 == 1) {
		header('location: counsellstage5.php');
	} else
		$msg = "Data have not been saved.";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title> Educational Details | OCS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./static/bootstrap.min.css">
	<link rel="stylesheet" href="./static/custom.css">
	<script src="./static/jquery.min.js.download"></script>
	<script src="./static/bootstrap.min.js.download"></script>
	<link rel="stylesheet" type="text/css" href="./static/custom1.css">
	<script type="text/javascript" src="./static/AcadmicDetail.js"></script>
</head>

<body>

	<?php require_once "includes/menu.header.php" ?>
	<?php require_once "includes/user.navbar.header.php" ?>
	<div class="container MainContainer">
		<div class="row">
			<div class="col-sm-3 col-xs-12">
				<div class="panel panel-primary">
					<div class="panel-heading">Dashboard</div>
					<div class="panel-body">
						<div class="msgimg">
							<?php if (!$pic) {  ?>
								<img src="./static/img_avatar.png" style=" width: 100px;">
							<?php } else {  ?>
								<img src="<?php echo $pic; ?>" style=" width: 100px;">
							<?php } ?>
						</div>
						<ul class="nav nav-pills nav-stacked" role="tablist" style="padding-top: 10px;">
							<li><a href="userindex.php">Home</a></li>
							<li class="active"><a href="counsellstage.php">Apply for Counselling</a></li>
							<li><a href="checkstatus.php">Check Status</a></li>
							<li><a href="feesubmission.php">Fee Submission</a></li>
							<li><a href="changepassword.php">Change Password</a></li>
							<li><a href="logout.php">Logout</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-sm-9 col-xs-12">
				<div class="panel panel-primary">
					<div class="panel-heading"> Educational Details - Step 4</div>
					<div class="panel-body">
						<span><?php echo $msg; ?></span>
						<form action="" class="form-horizontal" method="post" accept-charset="utf-8" onsubmit="javascript:return validate()">
							<table class="table table-responsive">
								<thead>
									<tr>
										<th>Please Check</th>
										<th>Exam Name</th>
										<th>Board/University</th>
										<th>Subjects</th>
										<th>Passing Year</th>
										<th>Obtained Marks</th>
										<th>Total Marks</th>
										<th>Divsion</th>
									</tr>
								</thead>
								<tr>
									<td><input type="checkbox" name="q1" checked=""></td>
									<td>
										<div class="form-group">
											<div class="col-sm-12 col-xs-12">
												<select class="form-control" name="exam_name1">
													<option selected="" value="Matriculation">Matriculation</option>

												</select>
											</div>
										</div>
									</td>
									<td>
										<div class="form-group">
											<div class="col-sm-12">
												<input type="text" name="board1" required class="form-control" id="board">
											</div>
										</div>
									</td>
									<td style="width: 100px;">
										<div class="form-group">
											<div class="col-sm-12">
												<input type="text" name="subjects1" required id="sub" class="form-control">
											</div>
										</div>
									</td>
									<td style="width: 100px;">
										<div class="form-group">
											<div class="col-sm-12">
												<input type="text" name="yearpassing1" required id="yop" class="form-control">
											</div>
										</div>
									</td>
									<td style="width: 100px;">
										<div class="form-group">
											<div class="col-sm-12">
												<input type="text" name="obtainedmarks1" required id="obtn" class="form-control">
											</div>
										</div>
									</td>
									<td style="width: 100px;">
										<div class="form-group">
											<div class="col-sm-12">
												<input type="text" name="totalmarks1" required id="total" class="form-control">
											</div>
										</div>
									</td>
									<td style="width: 100px;">
										<div class="form-group">
											<div class="col-sm-12">
												<select class="form-control" name="div1" id="type1" required="">
													<option value="">select Div</option>
													<option value="1st Div">1st Div</option>
													<option value="2nd Div">2nd Div</option>
													<option value="3rd Div">3rd Div</option>
													<option value="Awaited">Awaited</option>
												</select>
											</div>
										</div>
									</td>

								</tr>
								<tr>
									<td><input type="checkbox" name="q2" id="chk"></td>
									<td>
										<div class="form-group">
											<div class="col-sm-12">
												<select class="form-control" name="exam_name2">
													<option>ITI</option>
													<option selected="" value="Intermediate">Intermediate</option>
												</select>
											</div>
										</div>
									</td>
									<td>
										<div class="form-group">
											<div class="col-sm-12">
												<input type="text" name="board2" id="board1" class="form-control">
											</div>
										</div>
									</td>
									<td style="width: 100px;">
										<div class="form-group">
											<div class="col-sm-12">
												<input type="text" name="subjects2" id="sub1" class="form-control">
											</div>
										</div>
									</td>
									<td style="width: 100px;">
										<div class="form-group">
											<div class="col-sm-12">
												<input type="text" name="yearpassing2" id="yop1" class="form-control">
											</div>
										</div>
									</td>
									<td style="width: 100px;">
										<div class="form-group">
											<div class="col-sm-12">
												<input type="text" name="obtainedmarks2" id="obtn1" class="form-control">
											</div>
										</div>
									</td>
									<td style="width: 100px;">
										<div class="form-group">
											<div class="col-sm-12">
												<input type="text" name="totalmarks2" id="total1" class="form-control">
											</div>
										</div>
									</td>
									<td style="width: 100px;">
										<div class="form-group">
											<div class="col-sm-12">
												<select class="form-control" name="div2" id="type2" required="">
													<option value="">select Div</option>
													<option value="1st Div">1st Div</option>
													<option value="2nd Div">2nd Div</option>
													<option value="3rd Div">3rd Div</option>
													<option value="Awaited">Awaited</option>
												</select>
											</div>
										</div>
									</td>

								</tr>


							</table>
							<div class="form-group">
								<div class="col-xs-12 col-sm-10">
									<button type="submit" class="btn btn-primary" name="savenext" onclick="acadValidate()">Save & Next</button>
								</div>
							</div>
					</div>
					</form>
					<span style="color: red; font-weight: bold; margin-left: 5px">If Your result is awaited then put 0 in the Obtained Marks Section and select Awaited</span>
				</div>
			</div>
		</div>
	</div>
	</div>
	<?php require_once "includes/foot.footer.php" ?>