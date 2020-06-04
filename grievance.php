<?php
	require 'connect.php';
	$ack="";
	if (isset($_POST['submit'])) {
		
		$name=$_POST['name'];
		$sid=$_POST['id'];
		$mobile=$_POST['mobile'];
		$course=$_POST['course'];
		$problem=$_POST['problem'];

		$sql="INSERT INTO `grievance` (`name`, `sid`, `mobile_no`, `course`, `problem`) VALUES ('$name', '$sid', '$mobile', '$course', '$problem')";
		$sucess=mysqli_query($con,$sql);

		if ($sucess===TRUE) {
			
			$ack="Your grievance has been recorded. you will be updated soon.";
		}
		else{
				header('location: grievance.php');
		}
	}
?>
<?php require_once "includes/static.header.php" ?>
<?php require_once "includes/menu.header.php" ?>
<?php require_once "includes/navbar.header.php" ?>
<div class="container MainContainer">
	<div class="row">
		<div class="col-sm-3 col-xs-12">
			
		</div>
		<div class="col-sm-6">
			<div class="panel panel-primary">
				<div class="panel-heading">Grievance Submission</div>
				<div class="panel-body">
					<form action=" " class="form-horizontal" method="post" accept-charset="utf-8">
						<span style="color: green; font-weight: bold;"><?php echo "$ack" ?></span>
  								<div class="form-group">
  									<div class="col-sm-12">
  										<input type="text" value="" class="form-control" required="" name="name" placeholder="Enter your name" id="name" autocomplete="off" style="text-transform: capitalize;">
  									</div>
  								</div>
  								<div class="form-group">
  									<div class="col-sm-12">
  										<input type="text" class="form-control" name="id" placeholder="Enter your ID" required="" id="id" autocomplete="off">
  									</div>
  								</div>
  								<div class="form-group">
  									<div class="col-sm-12">
  										<input type="mobile" name="mobile" id="mobile" required="" placeholder="Enter your mobile number" class="form-control" autocomplete="off">
  									</div>
  								</div>
  								<div class="form-group">
  									<div class="col-sm-12">
								   	<select class="form-control" name="course" id="course" required="">
								   		<option value="">--Select Course--</option>
								   		<option value="Diploma">Diploma</option>
								   		<option value="Under-Graduate">Under-Graduate</option>
								   		<option value="Post-Graduate">Post-Graduate</option>
								   		<option value="Doctorate">Doctorate</option>
								   		<option value="P.G Diploma">P.G Diploma</option>
								   	</select>
								</div>
								  </div>
  								<div class="form-group">
  									<div class="col-sm-12">
  										<textarea required="" class="form-control" name="problem" id="problem" placeholder="Describe your problem here." rows="5" autocomplete="off"></textarea>
  									</div>
  								</div>
  								<br>
  								<div class="form-group">
  									<div class=" col-sm-10">
  										<button type="submit" class="btn btn-primary" name="submit" onclick="griValidate()">Submit</button>
  										<button type="reset" class="btn btn-primary">Clear</button>
  									</div>
  								</div>
  							</form>
  						</div>
				</div>
				
			</div>
			
		</div>
	</div>
</div>
<?php require_once "includes/foot.footer.php" ?>