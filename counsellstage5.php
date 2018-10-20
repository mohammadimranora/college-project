<?php
	require 'connect.php';
	session_start();
	if (!isset($_SESSION['userid'])) {
		header('location: index.php');
	}

	$cen=$cen1=$cen2=$cou=$cou1=$cou2="";
	$Status=$msgError="";
	$pic=$_SESSION["UserData"]["pic"];

	if (isset($_POST['savenext'])) {
		
		$cen=$_POST['center'];
		$cou=$_POST['course'];
		$cen1=$_POST['center1'];
		$cou1=$_POST['course1'];
		$cen2=$_POST['center2'];
		$cou2=$_POST['course2'];

		if ($cen!="" && $cou!="" && $cen1!="" && $cou1!="" && $cen2!="" && $cou2!="") {

			$sqlInsert="INSERT INTO `course_choice`(`sid`, `course_id`, `center`, `course`, `center_1`, `course_1`, `center_2`, `course_2`) VALUES ('$_SESSION[userid]','$_SESSION[courseid]','$cen','$cou','$cen','$cou1','$cen2','$cou2');";

			$Status=mysqli_query($con,$sqlInsert);

			if ($Status==1) {
				header('location: counsellstage50.php');
			}
			else{
				$msgError="Data have not been saved.";
			}
		}
		else{
			echo "<script>alert('Please Select Course Options')";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  		<title> Choice Selection | OCS</title>
 		<meta name="viewport" content="width=device-width, initial-scale=1">
 		<link rel="stylesheet" href="./index_files/bootstrap.min.css">
 		<link rel="stylesheet" href="./index_files/custom.css">
 		<script src="./index_files/jquery.min.js.download"></script>
 		<script src="./index_files/bootstrap.min.js.download"></script>	
 		<link rel="stylesheet" type="text/css" href="./index_files/custom1.css">
 		<script type="text/javascript" src="./index_files/courseSelect.js"></script>
 		<script type="text/javascript" src="./index_files/courseSelect1.js"></script>
 	</head>
<body>

<div>
	<div class="container">
  		<div class="row">
  			<div class="col-md-2 col-xs-12"> 
  				<a href="userindex.php">
  					<img src="./index_files/ocslogo.png" class="img-responsive classLogo"></a>
			</div>
 
			<div class="col-md-7 col-xs-12" style="padding-top: 8px;color: #4444a9;"> 
 				<div class="col-md-7 col-xs-12 hidden-xs">
 					<span style="
				    font-size: 20px;
				    font-weight: bold;
				    line-height: 45px; color: #5f4c4c;">
					ऑनलाइन काउंसलिंग सिस्टम</span>
				</div>
				<div class="col-md-5 col-xs-12">

				<span class="UrduText" style=" font-size: 20px;font-weight: bold;text-align:right; color: #5f4c4c">
				آن لائن کوسللنگ سسٹم </span>

				</div>
				<br>
				<div class="col-md-12 col-xs-12 ">

				<span class="MANUUEngText" style="color: #5f4c4c;">Online Counselling System </span>
				</div>
			</div>
			<div class="col-md-3 hidden-xs" style="color: #5f4c4c;text-align: right;font-weight: bold;">
				<br>Call Us : +91-9160659149
				<br>Mail Us : queries@ocs.com
			</div>
		</div>
	</div>
</div>

<nav class="navbar navbar-default" role="navigation" style="background: #5f4c4c;">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
    	</button>    
    </div>
  	<div class="navbar-collapse collapse">
  		<div class="container">
			<ul class="headerNav nav navbar-nav " style=" float: right;">
				<li class=""><a href=" ">Hi...<?php echo $_SESSION['username'];?></a></li>
				<li class=""><a href="logout.php">Logout</a></li>
				
			</ul>
		</div>
	</div>
</nav>
<div class="container MainContainer">
	<div class="row">
		<div class="col-sm-3 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading">Dashboard</div>
				<div class="panel-body">
					<div class="msgimg">
						<?php if(!$pic) {  ?>
			            <img src="./index_files/img_avatar.png" style=" width: 100px;">
			            <?php } else {  ?>
			            <img src="<?php echo $pic;?>" style=" width: 100px;">
			            <?php } ?>
					</div >
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
		<div class="col-sm-8 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading"> Choice Selection - Step 5</div>
				<div class="panel-body">
					<form action="" class="form-horizontal" method="post" accept-charset="utf-8">
						<div class="form-inline inputGroup">
							<div class="col-4">
								<label>1st &nbspChoice <span style="color: red; font-weight: bold;">*</span></label>
								<select class="form-control" name="center" id="center" onchange="setStates();" required="">
									<option selected="" value="" disabled="">--Select Center--</option>
									<option value="HYDERABAD">HYDERABAD</option>
									<option value="BANGALORE">BANGALORE</option>
									<option value="DARBHANGA">DARBHANGA</option>
									<option value="KADAPA">KADAPA</option>
									<option value="CUTTACK">CUTTACK</option>
								</select>
								<select class="form-control" name="course" id="course" required="">
									<option selected="" value="-1" disabled="">--Select Course--</option>
									<option value="">--Please Select a Course</option>
								</select>
							</div>
						</div>
						<br>
						<div class="form-inline inputGroup">
							<div class="col-4">
								<label>2nd Choice <span style="color: red; font-weight: bold;">*</span></label>
								<select class="form-control" name="center1" id="center1" onchange="setStates1();" required="">
									<option selected="" value="" disabled="">--Select Center--</option>
									<option value="HYDERABAD">HYDERABAD</option>
									<option value="BANGALORE">BANGALORE</option>
									<option value="DARBHANGA">DARBHANGA</option>
									<option value="KADAPA">KADAPA</option>
									<option value="CUTTACK">CUTTACK</option>
								</select>
								<select class="form-control" name="course1" id="course1" required="">
									<option selected="" value="-1" disabled="">--Select Course--</option>
									<option value="">--Please Select a Course</option>
								</select>
							</div>
						</div>
						<br>
						<div class="form-inline inputGroup">
							<div class="col-4">
								<label>3rd Choice <span style="color: red; font-weight: bold;">*</span></label>
								<select class="form-control" name="center2" id="center2" onchange="setStates2();" required="">
									<option selected="" value="" disabled="">--Select Center--</option>
									<option value="HYDERABAD">HYDERABAD</option>
									<option value="BANGALORE">BANGALORE</option>
									<option value="DARBHANGA">DARBHANGA</option>
									<option value="KADAPA">KADAPA</option>
									<option value="CUTTACK">CUTTACK</option>
								</select>
								<select class="form-control" name="course2" id="course2" required="">
									<option selected="" value="-1" disabled="">--Select Course--</option>
									<option value="">--Please Select a Course</option>
								</select>
							</div>
						</div>
						<br>
						<div class="form-group">
							<div class="col-xs-12 col-sm-10">
								<button type="submit" class="btn btn-primary" name="savenext" onclick="SeleValid()">Save & Next</button>
							</div>
						</div>
						<div class="panel panel-primary">
							<ul style="color: green;">
								<li> EC ENGG. : Electronics & Communication Engineering</li>
								<li> CS ENGG. : Computer Science Engineering</li>
								<li> IT ENGG. : Information Technology Engineering</li>
								<li> EE ENGG. : Electrical & Electronics Engineering</li>
								<li> Mechanical Engineering</li>
								<li> Automobile Engineering</li>
								<li> Apparel Technology</li>
							</ul>							
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<footer class="container-fluid navbar-static text-center" style="background-color: #5f4c4c;">
	<p style="margin: 10px 0 10px;">Designed and Developed by Mohammad & Team, Under guidence of Dr. Muqeem Ahmed</p>
</footer>
<style>

footer 
{
	    background: #4267b2;
		padding:0 !important;
		color:white;
}
@media (min-width: 768px) {
  .navbar-nav.navbar-center {
    position: absolute;
    left: 50%;
    transform: translatex(-50%);
  }
}

.navbar
{
	    margin-bottom: 15px;
}
</style>
<style>
.nav-tabs >.active > a{
	    background-color: white !important;
		    color: #05589e !important;
}
.msgimg img
{
	display: block;
    margin-left: auto;
    margin-right: auto;
    width: 50%;
    border-radius: 50%;
}
</style>
</body></html>