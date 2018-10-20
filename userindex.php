<?php
session_start();
if(!isset($_SESSION['userid']))
{
	header('location:index.php');
}
	$name="";
	$name=$_SESSION["username"];
	$pic=$_SESSION["UserData"]["pic"];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  		<title> User Home | OCS</title>
 		<meta name="viewport" content="width=device-width, initial-scale=1">
 		<link rel="stylesheet" href="./index_files/bootstrap.min.css">
 		<link rel="stylesheet" href="./index_files/custom.css">
 		<script src="./index_files/jquery.min.js.download"></script>
 		<script src="./index_files/bootstrap.min.js.download"></script>	
 		<link rel="stylesheet" type="text/css" href="./index_files/custom1.css">
 		<script type = "text/javascript" >
			function preventBack(){window.history.forward();}
			setTimeout("preventBack()", 0);
			window.onunload=function(){null};
	</script>
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
				<li class=""><a>Hi...<?php echo $name; ?></a></li>
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
					<ul class="nav nav-pills nav-stacked" role="tablist" style="padding-top: 10px; display: block;">
						<li class="active"><a href="userindex.php">Home</a></li>
						<li><a href="counsellstage1.php">Apply for Counselling</a></li>
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
				<div class="panel-heading">Instruction</div>
				<div class="panel-body">
					<p style=" font-weight: bold;    color: #3468b9;">
								Read the following Instructions before Filling the choices:
								</p>
								<ol>
									<li><strong>Please make sure that you are having all required information and documents in digital form. Because this system allows user to submit data in one go only.</strong></li>
  									<li>In case you want to change your password, Please use&nbsp;Chnage Password&nbsp;link to change password. <strong>New password</strong> will be sent to you on your registered email.</li>

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