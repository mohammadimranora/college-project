<?php
require 'connect.php';
session_start();
if (!isset($_SESSION['userid'])) {
	header('location:index.php');
}
$pic = $_SESSION["UserData"]["pic"];
$fname = $mname = $dob = $natioanlity = $religion = $income = $smobile = $pmobile = $emailid = $adhar = $ksm = "";
$msg = "";
$sid = $_SESSION['userid'];
if (isset($_POST['save'])) {

	$fname = $_POST['fname'];
	$mname = $_POST['mname'];
	$dob = $_POST['dob'];
	$nationality = $_POST['natioanlity'];
	$religion = $_POST['religion'];
	$income = $_POST['income'];
	$smobile = $_POST['mobile_student'];
	$pmobile = $_POST['mobile_parents'];
	$emailid = $_POST['email'];
	$adhar = $_POST['ano'];
	$ksm = $_POST['Migrant'];

	$sql = "INSERT INTO `personal_details`(`sid`, `f_name`, `m_name`, `dob`, `nationality`, `religion`, `family_income`, `student_mobile`, `parents_mobile`, `email`, `adhar`, `kashmiri_migrant`) VALUES ('$_SESSION[userid]','$fname','$mname','$dob','$nationality','$religion','$income','$smobile','$pmobile','$emailid','$adhar','$ksm');";

	$status = mysqli_query($con, $sql);

	if ($status == 1) {
		header('location: counsellstage3.php');
	} else {
		$msg = "Already, You Have submitted Personal Details ";
	}
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
					Dashboard
				</div>
				<div class="panel-body">
					<div class="msgimg">
						<?php if (!$pic) {  ?>
							<img src="./index_files/img_avatar.png" style=" width: 100px;">
						<?php } else {  ?>
							<img src="<?php echo $pic; ?>" style=" width: 100px;">
						<?php } ?>
					</div>
					<ul class="nav nav-pills nav-stacked" role="tablist" style="padding-top: 10px;">
						<li><a href="userindex.php">Home</a></li>
						<li class="active"><a href="counsellstage1.php">Apply for Counselling</a></li>
						<li><a href="checkstatus.php">Check Status</a></li>
						<li><a href="feesubmission.php">Fee Submission</a></li>
						<li><a href="changepassword.php">Change Password</a></li>
						<li><a href="logout.php">Logout</a></li>

					</ul>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading"> Personal Details - Step 2</div>
				<div class="panel-body">
					<span><?php echo $msg; ?></span>
					<form action="" class="form-horizontal" method="post" accept-charset="utf-8">
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" class="form-control" required id="fname" name="fname" placeholder="Father's Name" autocomplete="off">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" class="form-control" name="mname" id="mname" placeholder="Mother's Name" required autocomplete="off">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="date" name="dob" required id="dob" placeholder="Date of Birth DD/MM/YYYY" class="form-control" autocomplete="off">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" name="natioanlity" required id="nationality" placeholder="Natioanlity" class="form-control" autocomplete="off">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<select class="form-control" name="religion" id="religion" required>
									<option value="">--Select Religion--</option>
									<option value="Islam">Islam</option>
									<option value="Hinduism">Hinduism</option>
									<option value="Christianity">Christianity</option>
									<option value="Sikhism">Sikhism</option>
									<option value="Buddhism">Buddhism</option>
									<option value="Jainism">Jainism</option>
									<option value="Other">Other</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<select class="form-control" required="" name="income" id="income">
									<option value="">Select Family Income</option>
									<option value="50000">0-50,000</option>
									<option value="100000">50,0000-1,00,000</option>
									<option value="200000">1,00,000-2,00,0000</option>
									<option value="300000">2,00,000-5,00,000</option>
									<option value="500000">5,00,000-Above</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" name="mobile_student" required id="mobile_student" placeholder="Enter your Mobile Number" class="form-control" autocomplete="off">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" name="mobile_parents" required id="mobile_parents" placeholder="Enter your Parents Mobile Number" class="form-control" autocomplete="off">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="email" name="email" required id="email" placeholder="Enter your Email Number" class="form-control" autocomplete="off" style="text-transform: lowercase;">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" name="ano" required id="ano" placeholder="Adhar Number Like 1245-4865-4512" class="form-control" autocomplete="off">
							</div>
						</div>
						<br>
						<label>Are you a Kashmiri Migrant?<span style="color: red; font-weight: bold">*</span></label>
						<div class="form-group">
							<div class="col-sm-12">
								<label>Yes</label>&nbsp<input type="radio" name="Migrant" value="Yes">
								<label>No</label>&nbsp<input type="radio" name="Migrant" value="No">
							</div>
						</div>
						<br>
						<div class="form-group">
							<div class="col-xs-12 col-sm-10">
								<button type="submit" class="btn btn-primary" name="save" onclick="validatePersonal()"> Save & Next</button>
							</div>
						</div>
					</form>
				</div>

			</div>

		</div>
	</div>
</div>
<?php require_once "includes/foot.footer.php" ?>