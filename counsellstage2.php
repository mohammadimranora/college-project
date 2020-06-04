<?php
	require 'connect.php';
	session_start();
	if(!isset($_SESSION['userid']))
	{
		header('location:index.php');
	}
	$pic=$_SESSION["UserData"]["pic"];
	$fname=$mname=$dob=$natioanlity=$religion=$income=$smobile=$pmobile=$emailid=$adhar=$ksm="";
	$msg="";
	$sid=$_SESSION['userid'];
	if (isset($_POST['save'])) {
		
		$fname=$_POST['fname'];
		$mname=$_POST['mname'];
		$dob=$_POST['dob'];
		$nationality=$_POST['natioanlity'];
		$religion=$_POST['religion'];
		$income=$_POST['income'];
		$smobile=$_POST['mobile_student'];
		$pmobile=$_POST['mobile_parents'];
		$emailid=$_POST['email'];
		$adhar=$_POST['ano'];
		$ksm=$_POST['Migrant'];

		$sql="INSERT INTO `personal_details`(`sid`, `f_name`, `m_name`, `dob`, `nationality`, `religion`, `family_income`, `student_mobile`, `parents_mobile`, `email`, `adhar`, `kashmiri_migrant`) VALUES ('$_SESSION[userid]','$fname','$mname','$dob','$nationality','$religion','$income','$smobile','$pmobile','$emailid','$adhar','$ksm');";

		$status=mysqli_query($con,$sql);

		if ($status==1) {
			header('location: counsellstage3.php');
		}
		else{
			$msg="Already, You Have submitted Personal Details ";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  		<title> Personal Details | OCS</title>
 		<meta name="viewport" content="width=device-width, initial-scale=1">
 		<link rel="stylesheet" href="./index_files/bootstrap.min.css">
 		<link rel="stylesheet" href="./index_files/custom.css">
 		<script src="./index_files/jquery.min.js.download"></script>
 		<script src="./index_files/bootstrap.min.js.download"></script>	
 		<link rel="stylesheet" type="text/css" href="./index_files/custom1.css">
 		<script type="text/javascript" src="./index_files/PersionalDetail.js"></script>
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
				<li class=""><a href="index.php">Hi...<?php echo $_SESSION['username']?></a></li>
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
						Dashboard					
				</div>
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
		<div class="col-sm-6 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading"> Personal Details - Step 2</div>
				<div class="panel-body">
					<span><?php echo $msg;?></span>
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
</style>

</body></html>