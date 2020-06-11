<?php
require 'connect.php';
session_start();
if (!isset($_SESSION['userid'])) {
	header('location:index.php');
}
$pic = $_SESSION["UserData"]["pic"];

$msg = $name = $id = $course = $category = $rank = "";
$id = $_SESSION["userid"];

$sql = "select *from student_info where sid='$id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

$name = $row["name"];
$id = $row["sid"];

$course = $row["courseid"];
$category = $row["category"];
$rank = $row["rank_scored"];
$_SESSION['courseid'] = $course;

$sqlstchk = "select * FROM `counsell_status` where sid='$id'";
$result1 = mysqli_query($con, $sqlstchk);
$row_num = mysqli_num_rows($result1);

if ($row_num == 1) {

	$msg = "You have already applied for Counselling, need not to submit data again. Thank You. Wish you for your bright future.";
} else {
	if (isset($_POST['procced'])) {

		header('location: counsellstage2.php');
	}
}
mysqli_close($con);
?>
<?php require_once "includes/static.header.php" ?>
<?php require_once "includes/menu.header.php" ?>
<?php require_once "includes/user.navbar.header.php" ?>
<div class="container MainContainer">
	<div class="row">
		<?php require_once "includes/student.side-bar.php" ?>
		<div class="col-sm-6 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading"> Partial Details - Step 1</div>
				<div class="panel-body">
					<form action="" class="form-horizontal" method="post" accept-charset="utf-8">
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" class="form-control" name="name" readonly="" value="<?php echo $name; ?>">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" class="form-control" name="id" readonly="" value="<?php echo $id; ?>">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" class="form-control" name="course" readonly="" value="<?php echo $course; ?>">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" class="form-control" name="category" readonly="" value="<?php echo $category; ?>">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" class="form-control" name="rank" readonly="" value="<?php echo $rank; ?>">
							</div>
						</div>

						<br>
						<div class="form-group">
							<div class="col-sm-1 col-sm-10">
								<button type="submit" class="btn btn-primary" name="procced">Procced</button>
							</div>
						</div>
					</form>

				</div>

				<div style="padding-left: 15px;padding-right: 15px; color: red; font-weight: bold;"><span><?php echo $msg; ?></span></div>

			</div>

		</div>
	</div>
</div>
<?php require_once "includes/foot.footer.php" ?>