<?php
	require 'connect.php';
	session_start();
	if (!isset($_SESSION['adminid'])) {
		
		header('location: logout.php');
	}
	$formData=array();
	$msgToDisplay="";

	if (isset($_POST['create'])) {
		
		$formData[0]=$_POST['cid'];
		$formData[1]=$_POST['catCourseId'];
		$formData[2]=$_POST['coursename'];
		$formData[3]=$_POST['deptid'];
		$formData[4]=$_POST['duration'];
		$formData[5]=$_POST['no_of_seat'];
		$formData[6]=$_POST['type'];
		$formData[7]=$_POST['fee'];
		$formData[8]=$_POST['reservedseat'];

		$CourseCheck="SELECT `cat_course_id`, `dept_id` FROM `course_info` WHERE cat_course_id='$formData[1]' AND dept_id='$formData[3]'";
		$CourseInsert="INSERT INTO `course_info`(`course_id`, `cat_course_id`, `course_name`, `dept_id`, `duration`, `no_of_seats`, `type`, `fee`, `reserved_seats`) VALUES ('$formData[0]','$formData[1]','$formData[2]','$formData[3]','$formData[4]','$formData[5]','$formData[6]','$formData[7]','$formData[8]')";

		$CourseCheckStatus=mysqli_query($con,$CourseCheck);

		if (mysqli_num_rows($CourseCheckStatus)>0) {

			$msgToDisplay="Course is added already. Insert Another course";
		}
		else
		{
			$CourseAddStatus=mysqli_query($con,$CourseInsert);
			if ($CourseAddStatus==1) {
				$msgToDisplay="Course has been created";
			}
		}
	}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  		<title> Create Course | OCS</title>
 		<meta name="viewport" content="width=device-width, initial-scale=1">
 		<link rel="stylesheet" href="./index_files/bootstrap.min.css">
 		<link rel="stylesheet" href="./index_files/custom.css">
 		<script src="./index_files/jquery.min.js.download"></script>
 		<script src="./index_files/bootstrap.min.js.download"></script>	
 		<link rel="stylesheet" type="text/css" href="./index_files/custom1.css">
 		<script type="text/javascript" src="./index_files/createcourse.js"></script>
 	</head>
<body>

<div>
	<div class="container">
  		<div class="row">
  			<div class="col-md-2 col-xs-12"> 
  				<a href="dacindex.php">
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
				<li class=""><a>Hi...<?php echo $_SESSION['username'];?></a></li>
				<li class=""><a href="logout.php">Logout</a></li>
				
			</ul>
		</div>
	</div>
</nav>
<div class="container MainContainer">
	<div class="row">
		<div class="col-sm-3 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
						Dashboard- DAC					
				</div>
				<div class="panel-body">
					<div class="msgimg">
						<img src="./index_files/img_avatar.png" style=" width: 100px;">
						
					</div >
					<ul class="nav nav-pills nav-stacked" role="tablist" style="padding-top: 10px; display: block;">
						<li><a href="dacindex.php">Home</a></li>
						<li class="active"><a href="AddCourse.php">Create Course</a></li>
						<li><a href="updatecourse.php">Update Course</a></li>
						<li><a href="deletecourse.php">Delete Course</a></li>
						<li><a href="confirmadmission.php">Confirm Admission</a></li>
						<li><a href="generateadmissionletter.php">Generate Admission Letter</a></li>
						<li><a href="dacchangepassword.php">Change Password</a></li>
						<li><a href="logout.php">Logout</a></li>        
					</ul>
				</div>				
			</div>
			
		</div>
		<div class="col-sm-7 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading">Create Course</div>
				<div class="panel-body">
					<span style="color: green; font-weight: bold; text-transform: capitalize;"><?php echo $msgToDisplay;?></span>
					<form action="" class="form-horizontal" method="post" accept-charset="utf-8">
  								<div class="form-group">
  									<div class="col-sm-12">
  										<input type="text" value="" id="courseid" class="form-control" required="" name="cid" placeholder="Course ID" style="text-transform: uppercase;">
  									</div>
  								</div>
  								<div class="form-group">
  									<div class="col-sm-12">
  										<input type="text" id="ccid" class="form-control" name="catCourseId" placeholder="category Course Id" required="" style="text-transform: uppercase;">
  									</div>
  								</div>
  								<div class="form-group">
  									<div class="col-sm-12">
  										<input type="text" id="cname" name="coursename" required="" placeholder="Course Name" class="form-control" style="text-transform: uppercase;">
  									</div>
  								</div>
  								<div class="form-group">
  									<div class="col-sm-12">
  										<input type="text" id="did" name="deptid" required="" placeholder="Dept. ID" class="form-control" style="text-transform: uppercase;">
  									</div>
  								</div>
							<div class="form-group">
  									<div class="col-sm-12">
  										<select class="form-control" name="duration" id="cduration" required="">
  											<option value="">--Select Course Duration--</option>
  											<option value="1">1 Semester</option>
  											<option value="2">2 Semester</option>
  											<option value="4">4 Semester</option>
  											<option value="6">6 Semester</option>
  											<option value="8">8 Semester</option>
  										</select>
  									</div>
  								</div>
  								<div class="form-group">
  									<div class="col-sm-12">
  										<input type="Number" id="nos" name="no_of_seat" required="" placeholder="Number of Seat" class="form-control">
  									</div>
  								</div>
  								<div class="form-group">
  									<div class="col-sm-12">
  										<select name="type" id="ctype" class="form-control" required="">
  											<option value="">--Select Course Type--</option>
  											<option value="REGULAR">Regular</option>
  											<option value="DISTANCE">Distance</option>	
  										</select>
  									</div>
  								</div>
  								<div class="form-group">
  									<div class="col-sm-12">
  										<input type="Number" id="cfee" name="fee" required="" placeholder="Course Fee" class="form-control">
  									</div>
  								</div>
  								<div class="form-group">
  									<div class="col-sm-12">
  										<input type="Number" id="rseat" name="reservedseat" required="" placeholder="Reserved Seat" class="form-control">
  									</div>
  								</div>
								<br>
  								<div class="form-group">
  									<div class="col-xs-12 col-sm-10">
  										<button type="submit" class="btn btn-primary" name="create" onclick="addValidate()">Create</button>
  										<button type="reset" class="btn btn-primary">Clear</button>
  									</div>
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

.comp
{
	color:red;
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
.btn-success
{
	height: 150px;
	border-radius: 5%;
	width: 200px;
	padding-top: 10px;
	font-size: 20px;
	font-weight: bold;
}
</style>
</body></html>