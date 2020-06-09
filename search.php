<?php
require 'connect.php';
session_start();
if (!isset($_SESSION['adminid'])) {
	header('location:logout.php');
}
$msg = $result = $row = $count = "";
if (isset($_POST['search'])) {

	$value = mysqli_real_escape_string($con, $_POST['value']);
	$search = "SELECT *from `student_info` where name like '%" . $value . "%'";
	$result = mysqli_query($con, $search);
	$count = mysqli_num_rows($result);
}

?>
<?php require_once "includes/static.header.php" ?>

<?php require_once "includes/menu.header.php" ?>
<?php require_once "includes/user.navbar.header.php" ?>
<div class="container MainContainer">
	<div class="row">
		<div class="col-sm-3 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					Dashboard- CAC
				</div>
				<div class="panel-body">
					<div class="msgimg">
						<img src="./static/img_avatar.png" style=" width: 100px;">

					</div>
					<ul class="nav nav-pills nav-stacked" role="tablist" style="padding-top: 10px; display: block;">
						<li><a href="cacindex.php">Home</a></li>
						<li><a href="allotment.php">Allot Seat & Center</a></li>
						<li><a href="verify.php">Verify Document</a></li>
						<li><a href="enrollmentno.php">Generate Enrollment No</a></li>
						<li><a href="stats.php">Generate Stats</a></li>
						<li class="active"><a href="search.php">Search Student</a></li>
						<li><a href="report.php" target="_blank">Generate Report</a></li>
						<li><a href="enablepay.php">Enable Payment</a></li>
						<li><a href="cacchangepassword.php">Change Password</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</div>
			</div>

		</div>
		<div class="col-sm-8 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading">Search</div>
				<div class="panel-body">
					<span style="color: green; font-weight: bold;"><?php echo $msg; ?></span>
					<form action="" class="form-horizontal" method="post" accept-charset="utf-8">
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" class="form-control" placeholder="Search Here" required name="value" autocomplete="off" autofocus="on">
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-5 col-xs-12">
								<button type="submit" class="btn btn-primary" name="search">Search Student</button>
								<button type="reset" class="btn btn-primary"> Clear</button>
							</div>
						</div>
					</form>
					<table class="table table-responsive">
						<thead>
							<th>SID</th>
							<th>Name</th>
							<th>Course ID</th>
							<th>Rank</th>
							<th>Category</th>
							<th>E-Mail</th>
						</thead>
						<?php
						if ($count >= 1) {

							while ($row = mysqli_fetch_array($result)) {

								$sid = $row[0];
								$name = $row[1];
								$course = $row[2];
								$rank = $row[3];
								$category = $row[4];
								$email = $row[6];

								echo "<tr>
								        <td>$sid</td>
								        <td>$name</td>
								        <td>$course</d>
								        <td>$rank</td>
								        <td>$category</d>
								        <td>$email</d>
								      </tr>";
							}
						}

						?>

					</table>

				</div>
			</div>
		</div>
	</div>
</div>
<?php require_once "includes/foot.footer.php" ?>