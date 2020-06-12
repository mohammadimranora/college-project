<?php
require 'connect.php';
$status = $sucess = $msg = "";
if (isset($_POST['submit'])) {

	$fname = $_POST['Fullname'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$ptype = $_POST['type'];
	$description = $_POST['description'];

	$sqlInsert = "INSERT INTO `support`(`name`, `email`, `mobile`, `type`, `description`) VALUES ('$fname','$email','$mobile','$ptype','$description')";

	$sucess = mysqli_query($con, $sqlInsert);

	if ($sucess == 1) {
		$status = "Your query for Help and Support has been submitted. We'll get back to you soon.";
		$msg = "Complaint Reference No: CP$mobile";
	}
}
?>
<?php require_once "../includes/static.header.php" ?>
<?php require_once "../includes/menu.header.php" ?>
<?php require_once "../includes/navbar.header.php" ?>



<div class="container MainContainer">
	<div class="row">
		<div class="col-sm-3">

		</div>
		<div class="col-sm-6">
			<div class="panel panel-primary">
				<div class="panel-heading">Support</div>
				<div class="panel-body">
					<span style="color: green; font-weight: bold;"><?php echo $status;
																	echo $msg; ?></span>
					<form action=" " class="form-horizontal" method="post" accept-charset="utf-8">
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" value="" id="name" required class="form-control" placeholder="Enter Full Name" name="Fullname" style="text-transform: capitalize;" autocomplete="off">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="email" value="" class="form-control" id="email" placeholder="Enter Your Email" required name="email" style="text-transform: lowercase;" autocomplete="off">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" value="" class="form-control" id="mobile" placeholder="Enter Your Mobile" required name="mobile" autocomplete="off">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<select class="form-control" name="type" required id="type">
									<option value=''>--Select Problem Type--</option>
									<option value='Query'>Query</option>
									<option value='Technical'>Technical</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<textarea class="form-control" id="des" placeholder="Enter Problem Description" required name="description" autocomplete="off"></textarea>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-5 col-sm-7">
								<button type="submit" class="btn btn-primary" name="submit" onclick="helpValidate()">Submit</button>
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