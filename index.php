<?php
	require 'connect.php';
	session_start();
	$errLogin=$CounsellingStatus="";
	if (isset($_POST['login'])) {

		$userid=clean_data($_POST['user_id']);
		$pass=clean_data($_POST['password']);
		$captcha=clean_data($_POST['captcha']);
		$sql="select *from student_login where sid='$userid' AND password='$pass'";
		$result=mysqli_query($con,$sql);
		if (mysqli_num_rows($result)==1) {
			if ($captcha==$_SESSION['code']) {
				$_SESSION['userid']=$userid;
				$sqlname="select * from student_info where sid='$userid'";
				$run=mysqli_query($con,$sqlname);
				$row=mysqli_fetch_assoc($run);
				$row1=mysqli_fetch_assoc($result);
				$_SESSION['username']=$row["name"];
				$_SESSION['courseid']=$row["courseid"];
				$_SESSION['UserData']=$row;
				
				$resultmy="SELECT `msg`, `status` FROM `isadmissionopen`";
				$rowStatus=mysqli_query($con,$resultmy);
				$datarow=mysqli_fetch_array($rowStatus);
				if ($datarow[1]==1)
				{
					header('location: userindex.php');
				}
				else
				{
					$CounsellingStatus=$datarow[0];
				}
			}
			else
			{
				$errLogin="Invalid Captcha";
			}			
		}
		else{
			$errLogin="Either Your User ID Or Password is Wrong";
		}
	}
	function clean_data($data)
	{
		$data=trim($data);
		$data=htmlspecialchars($data);
		$data=stripcslashes($data);
		$data=strip_tags($data);
		return $data;
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  		<title>Home | OCS</title>
 		<meta name="viewport" content="width=device-width, initial-scale=1">
 		<link rel="stylesheet" href="./index_files/bootstrap.min.css">
 		<link rel="stylesheet" href="./index_files/custom.css">
 		<script src="./index_files/jquery.min.js.download"></script>
 		<script src="./index_files/bootstrap.min.js.download"></script>	
 		<link rel="stylesheet" type="text/css" href="./index_files/custom1.css">
 	</head>
<body>

<div style="background: white;">
	<div class="container">
  		<div class="row">
  			<div class="col-md-2 col-xs-12"> 
  				<a href="index.php">
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

				<span class="MANUUEngText" style="color: #5f4c4c;">Online Counselling System </span><br>
				<span class="MANUUEngText" style="font-size: 12px; padding-left: 5px;color: #5f4c4c;">An Automated Admission System</span>
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
  			<ul class="headerNav nav navbar-nav ">
  				<li class=""><a href="index.php">Home</a></li> 
  				<li class=""><a href="grievance.php">Grievance for counselling</a></li>
				<li class=""><a href="flowchart.php">Flowchart for Counselling</a></li>
				<li class=""><a href="msgcac.php"> Message </a></li>
				<li class=""><a href="help.php">Need Help?</a></li>
			</ul>
			<ul class="headerNav nav navbar-nav " style=" float: right;">
				
			</ul>
		</div>
	</div>
</nav>
<div class="container MainContainer">
	<div class="row">
		<div class="col-sm-3">
			<div class="panel panel-primary">
				<div class="panel-heading">Counselling Updates</div>
					<div class="panel-body">
						<ul>
    						<li><a href="#">Counselling Notification 2018 Here You can See Notification......</a></li>
						    <li><a href="#">Counselling Notification 2018</a></li>
						    <li><a href="#">Counselling Notification 2018</a></li>
						    <li><a href="#">Counselling Notification 2018</a></li>
						    <li><a href="#">Counselling Notification 2018</a></li>
						    <li><a href="#">Counselling Notification 2018</a></li>
						    <li><a href="#">Counselling Notification 2018</a></li>
						    <li><a href="#">Counselling Notification 2018</a></li>
						</ul>
					</div>
				</div>
				<div class="panel panel-primary">
					<div class="panel-heading">Instructional Video</div>
					<div class="panel-body">
						<video src="./resources/instruction.mp4" width="100%" height="auto" controls></video>
					</div>
					
				</div>
			</div>
			<div class="col-sm-6">
				<div class="panel panel-primary">
					<div class="panel-body">
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#">Instructions</a></li> 
						</ul>
						<div class="tab-content">
							<div id="InstructionsEnglish" class="tab-pane fade in active">
								<p style=" font-weight: bold;    color: #3468b9;">
								Read the following Instructions before Filling the choices:
								</p>
								<ol>
  									<li>To counsell yourself, you must be a qualified candidate. To login to this system. Use your <strong>Login ID</strong> and <strong>Password</strong> That you have been given at the time of application of entrance</li>

  									<li>Once you login to this system, you will see your <strong>partial perosnal details.</strong> After that just <strong>follow the instruction</strong>.</li>

  									<li>Once <strong>choices are locked. Can't be changed</strong>. Before final submit you <strong>review your choice option very carefully</strong>.</li>

  									<li>In case you have lost/forgot your password, Please use&nbsp;Forgot Password&nbsp;link to retrieve password. <strong>New password</strong> will be sent to you on your registered email.</li>

  									<li calss="style1">Be ready with these documents.</li>
  									<ul>
  										<li>Scanned copy of&nbsp;<strong>colored passport size Photo</strong> (3.5 x 4.5 cm) and <strong>Signature</strong>&nbsp;(3.5 x 1.5 cm) in JPG/JPEG format only. The file size of scanned photo should be less than 100KB and signature less than 50KB.
  										<li> <strong>Certificates of last exam passed</strong>. Maximum size allowed 200KB</li>
  										<li> <strong>Income certificate</strong>, issued by the Competent Authority. Maximum size allowed 200KB</li>
  										<li> <strong>Domicile Certificate</strong> by issued by the Competent Authority. Maximum size allowed 200KB</li>
  										<li><strong>Income Certificate</strong> by issued by the Competent Authority, If applicable. Maximum size allowed 200KB</li>
  										<li>College/School/University <strong>leaving certificate</strong>. Maximum size allowed 200KB</li>
  										<li><strong>Adhar card</strong>. Maximum size allowed 200KB</li>
  									</ul>
  								</ol>
  							</div>
  						</div> 
  					</div>
  				</div>
  			</div>
  			<div class="col-sm-3">
  				<div class="panel panel-primary">
  					<div class="panel-heading">Applicant Login</div>
  						<div class="panel-body">
  							<form action="" class="form-horizontal" method="post" accept-charset="utf-8">
  								<span style="color: red; font-weight: bold;"><?php echo "$errLogin"?></span>
  								<span style="color: red; font-weight: bold; text-transform: capitalize;"><?php echo $CounsellingStatus;?></span>
  								<div class="form-group">
  									<div class="col-sm-12">
  										<input type="text" value="" class="form-control" required="" name="user_id" placeholder="Enter your ID" id="user_id" autocomplete="off">
  										<span class="error"></span>
  									</div>
  								</div>
  								<div class="form-group">
  									<div class="col-sm-12">
  										<input type="password" class="form-control" name="password" placeholder="Enter Password" required="" id="password">
  										<span class="error"><span></span></span>
  									</div>
  								</div>
  								<div class="form-group">
  									<div class="col-sm-12">
  										<input type="text" name="captcha" class="form-control" placeholder="Enter Captcha" required="" id="captcha" autocomplete="off">
  									</div>
  								</div>
  								<div class="form-group">
  									<div class="col-sm-12">
  										<img src="captcha.php">
  									</div>
  								</div>
  								<br>
  								<div class="form-group">
  									<div class="col-sm-offset-1 col-sm-10">
  										<button type="submit" class="btn btn-primary" name="login" >Login</button>
  										<button type="reset" class="btn btn-primary">Clear</button>
  									</div>
  								</div>
  							</form>
  						</div>
  						<div class="panel-footer"><small><a href="forgotpass.php">Forgot Password</a></small>
  						</div>
  					</div>
  					<div class="panel panel-primary">
  						<div class="panel-heading"><h6>Important Links</h6></div>
  						<div class="panel-body">
  							<ul>
  								<li><a href="http://www.manuu.ac.in/Eng-Php/index-english.php" target="_blank">MANUU Main Web</a></li>
  								<li><a href="http://manuucoe.in/" target="_blank">MANUU COE</a></li>
  								<li><a href="http://manuucoe.in/cit/" target="_blank">MANUU CIT</a></li>
  								<li><a href="https://www.youtube.com/channel/UC8bmtIx3qQyHTnafF0uoUBA" target="_blank">MANUU IMC</a></li>
  							</ul>
  							
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
</style>
</body></html>