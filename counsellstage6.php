<?php
	session_start();
	if (!isset($_SESSION['userid'])) {
		header('location: index.php');
	}
	$pic=$_SESSION["UserData"]["pic"];
	$image=$msg=$msg2=$finalMsg="";
	$result8="";
	$target_file="";

	if (isset($_POST['submit1'])) {
		
			$image=addslashes($_FILES['pic']['tmp_name']);
			$name=addslashes($_FILES['pic']['name']);
			$image=file_get_contents($image);
			

			$imageFileType = strtolower(pathinfo($_FILES["pic"]["name"],PATHINFO_EXTENSION));
			$target_file = "upload/pic_" . time().'.'.$imageFileType;
			if (move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) {
			$msg2="The file ". basename( $_FILES["pic"]["name"]). " has been uploaded.";
			} else {
			$msg2="Sorry, there was an error uploading your file.";
			}
			$msg=savePic($target_file);
		}
	function savePic($image)
	{
		require 'connect.php';
		$sqlInsertPic="update  student_info set pic='$image' where sid='$_SESSION[userid]'";
		$result1=mysqli_query($con,$sqlInsertPic);
		if ($result1==1) {
			$msg="Picture Uploaded Sucessfully";
		}
		return $msg;
	}
	if (isset($_POST['submit2'])) {
		
			$image=addslashes($_FILES['sign']['tmp_name']);
			$name=addslashes($_FILES['sign']['name']);
			$image=file_get_contents($image);
			
			$imageFileType = strtolower(pathinfo($_FILES["sign"]["name"],PATHINFO_EXTENSION));
			$target_file = "upload/sign_" . time().'.'.$imageFileType;
			if (move_uploaded_file($_FILES["sign"]["tmp_name"], $target_file)) {
			$msg2="The file ". basename( $_FILES["sign"]["name"]). " has been uploaded.";
			} else {
			$msg2="Sorry, there was an error uploading your file.";
			}
			$msg=saveSign($target_file);

		}
	function saveSign($image)
	{
		$msg="";
		require 'connect.php';
		$sqlInsertSign="UPDATE `student_info` SET `signature`='$image' WHERE sid='$_SESSION[userid]'";
		$result2=mysqli_query($con,$sqlInsertSign);
		if ($result2==1) {
			$msg="Signature Uploaded Sucessfully";
		}
		return $msg;
	}
	if (isset($_POST['submit3'])) {
		
			$image=addslashes($_FILES['residential']['tmp_name']);
			$name=addslashes($_FILES['residential']['name']);
			$image=file_get_contents($image);
		
			$imageFileType = strtolower(pathinfo($_FILES["residential"]["name"],PATHINFO_EXTENSION));
			$target_file = "upload/residential_" . time().'.'.$imageFileType;
			if (move_uploaded_file($_FILES["residential"]["tmp_name"], $target_file)) {
			$msg2="The file ". basename( $_FILES["residential"]["name"]). " has been uploaded.";
			} else {
			$msg2="Sorry, there was an error uploading your file.";
			}
			$msg=saveResidential($target_file);

		}
	function saveResidential($image)
	{
		$msg="";
		require 'connect.php';
		$sqlInsertResidential="UPDATE `student_info` SET `residential_cert`='$image' WHERE sid='$_SESSION[userid]'";

		$result3=mysqli_query($con,$sqlInsertResidential);

		if ($result3==1) {
			$msg="Residential Certificate Uploaded Sucessfully";
		}
		return $msg;
	}
	if (isset($_POST['submit4'])) {
		
			$image=addslashes($_FILES['caste']['tmp_name']);
			$name=addslashes($_FILES['caste']['name']);
			$image=file_get_contents($image);
			
			$imageFileType = strtolower(pathinfo($_FILES["caste"]["name"],PATHINFO_EXTENSION));
			$target_file = "upload/caste_" . time().'.'.$imageFileType;
			if (move_uploaded_file($_FILES["caste"]["tmp_name"], $target_file)) {
			$msg2="The file ". basename( $_FILES["caste"]["name"]). " has been uploaded.";
			} else {
			$msg2="Sorry, there was an error uploading your file.";
			}
			$msg=saveCaste($target_file);

		}
	function saveCaste($image)
	{
		$msg="";
		require 'connect.php';
		$sqlInsertCaste="UPDATE `student_info` SET `caste_cert`='$image' WHERE sid='$_SESSION[userid]'";

		$result4=mysqli_query($con,$sqlInsertCaste);

		if ($result4==1) {
			$msg="Caste Certificate Uploaded Sucessfully";
		}
		return $msg;
	}
	if (isset($_POST['submit5'])) {
		
			$image=addslashes($_FILES['income']['tmp_name']);
			$name=addslashes($_FILES['income']['name']);
			$image=file_get_contents($image);
			
			$imageFileType = strtolower(pathinfo($_FILES["income"]["name"],PATHINFO_EXTENSION));
			$target_file = "upload/income_" . time().'.'.$imageFileType;
			if (move_uploaded_file($_FILES["income"]["tmp_name"], $target_file)) {
			$msg2="The file ". basename( $_FILES["income"]["name"]). " has been uploaded.";
			} else {
			$msg2="Sorry, there was an error uploading your file.";
			}
			$msg=saveIncome($target_file);

		}
	function saveIncome($image)
	{
		$msg="";
		require 'connect.php';
		$sqlInsertIncome="UPDATE `student_info` SET `income_cert`='$image' WHERE sid='$_SESSION[userid]'";
		$result5=mysqli_query($con,$sqlInsertIncome);
		if ($result5==1) {
			$msg="Income Certificate Uploaded Sucessfully";
		}
		return $msg;
	}
	if (isset($_POST['submit6'])) {
		
			$image=addslashes($_FILES['lastexampass']['tmp_name']);
			$name=addslashes($_FILES['lastexampass']['name']);
			$image=file_get_contents($image);
			$imageFileType = strtolower(pathinfo($_FILES["lastexampass"]["name"],PATHINFO_EXTENSION));
			$target_file = "upload/lastexampass_" . time().'.'.$imageFileType;
			if (move_uploaded_file($_FILES["lastexampass"]["tmp_name"], $target_file)) {
			$msg2="The file ". basename( $_FILES["lastexampass"]["name"]). " has been uploaded.";
			} else {
			$msg2="Sorry, there was an error uploading your file.";
			}
			$msg=saveExamCert($target_file);


		}
	function saveExamCert($image)
	{
		$msg="";
		require 'connect.php';
		$sqlInsertExamCert="UPDATE `student_info` SET `last_exam_marksmemo`='$image' WHERE sid='$_SESSION[userid]'";

		$result6=mysqli_query($con,$sqlInsertExamCert);

		if ($result6==1) {
			$msg="Marks Memo Uploaded Sucessfully";
		}
		return $msg;
	}
	if (isset($_POST['submit7'])) {
		
			$image=addslashes($_FILES['adhar']['tmp_name']);
			$name=addslashes($_FILES['adhar']['name']);
			$image=file_get_contents($image);
			$imageFileType = strtolower(pathinfo($_FILES["adhar"]["name"],PATHINFO_EXTENSION));
			$target_file = "upload/adhar_" . time().'.'.$imageFileType;
			if (move_uploaded_file($_FILES["adhar"]["tmp_name"], $target_file)) {
			$msg2="The file ". basename( $_FILES["adhar"]["name"]). " has been uploaded.";
			} else {
			$msg2="Sorry, there was an error uploading your file.";
			}
			$msg=saveAdhar($target_file);

		}
	function saveAdhar($image)
	{
		$msg="";
		require 'connect.php';
		$sqlInsertAdhar="UPDATE `student_info` SET `adhar`='$image' WHERE sid='$_SESSION[userid]'";

		$result7=mysqli_query($con,$sqlInsertAdhar);

		if ($result7==1) {
			$msg="Adhar Uploaded Sucessfully";
		}
		return $msg;
	}
	if (isset($_POST['submit8'])) {
		
			$image=addslashes($_FILES['leavingcert']['tmp_name']);
			$name=addslashes($_FILES['leavingcert']['name']);
			$image=file_get_contents($image);
			$imageFileType = strtolower(pathinfo($_FILES["leavingcert"]["name"],PATHINFO_EXTENSION));
			$target_file = "upload/leavingcert_" . time().'.'.$imageFileType;
			if (move_uploaded_file($_FILES["leavingcert"]["tmp_name"], $target_file)) {
			$msg2="The file ". basename( $_FILES["leavingcert"]["name"]). " has been uploaded.";
			} else {
			$msg2="Sorry, there was an error uploading your file.";
			}
			$msg=saveLeavingCert($target_file);


		}
	function saveLeavingCert($image)
	{
		$msg="";
		require 'connect.php';
		$sqlInsertLeavingCert="UPDATE `student_info` SET `leaving_cert`='$image' WHERE sid='$_SESSION[userid]'";

		$result8=mysqli_query($con,$sqlInsertLeavingCert);

		if ($result8==1) {
			$msg="Leaving Certificate Uploaded Sucessfully";
		}
		return $msg;
	}
	
	if (isset($_POST['submit'])) {
				
				header('location: finalsubmission.php');
	}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  		<title> Documents Upload | OCS</title>
 		<meta name="viewport" content="width=device-width, initial-scale=1">
 		<link rel="stylesheet" href="./index_files/bootstrap.min.css">
 		<link rel="stylesheet" href="./index_files/custom.css">
 		<script src="./index_files/jquery.min.js.download"></script>
 		<script src="./index_files/bootstrap.min.js.download"></script>	
 		<link rel="stylesheet" type="text/css" href="./index_files/custom1.css">
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
				<li class=""><a href="index.php">Hi...<?php echo $_SESSION['username'];?></a></li>
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
						<li><a href="">Change Password</a></li>
						<li><a href="logout.php">Logout</a></li>        
					</ul>
				</div>				
			</div>
		</div>
		<div class="col-sm-6 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading"> Documents Upload - Step 6</div>
				<div class="panel-body">
					<span style="color: green; font-weight: bold;"><?php echo $msg2; ?></span>
					<span style="color: green; font-weight: bold;"><?php echo $msg; ?></span>
					<form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<div class="col-sm-12">
								<label>Picture <span style="color: red; font-weight: bold;">*</span></label>
								<input type="file" class="form-control" name="pic" id="pic">
								<br>
								<input type="submit" name="submit1" value="Upload" class="btn btn-success"><br>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<label>Signature <span style="color: red; font-weight: bold;">*</span></label>
								<input type="file" class="form-control" name="sign" id="sign">
								<br>
								<input type="submit" name="submit2" value="Upload" class="btn btn-success">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<label>Residential Certificate <span style="color: red; font-weight: bold;">*</span></label>
								<input type="file" class="form-control" name="residential" id="res">
								<br>
								<input type="submit" name="submit3" value="Upload" class="btn btn-success">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<label>Caste Certificate <span style="color: red; font-weight: bold;">*</span></label>
								<input type="file" class="form-control" name="caste" id="cast">
								<br>
								<input type="submit" name="submit4" value="Upload" class="btn btn-success">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<label>Income Certificate <span style="color: red; font-weight: bold;">*</span></label>
								<input type="file" value="" class="form-control" name="income" id="income">
								<br>
								<input type="submit" name="submit5" value="Upload" class="btn btn-success">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<label>Last Exam Passed Marksheet <span style="color: red; font-weight: bold;">*</span></label>
								<input type="file" value="" class="form-control" name="lastexampass" id="marks">
								<br>
								<input type="submit" name="submit6" value="Upload" class="btn btn-success">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<label>Adhar <span style="color: red; font-weight: bold;">*</span></label>
								<input type="file" value="" class="form-control" name="adhar" id="adhar">
								<br>
								<input type="submit" name="submit7" value="Upload" class="btn btn-success">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<label>Leaving Certificate <span style="color: red; font-weight: bold;">*</span></label>
								<input type="file" value="" class="form-control" name="leavingcert" id="lcer">
								<br>
								<input type="submit" name="submit8" value="Upload" class="btn btn-success">
							</div>
						</div>
						<div class="form-group">
							<div class="col-xs-12 col-sm-10">
								<button type="submit" name="submit" class="btn btn-primary" onclick="docValidate()">Save & Next</button>
							</div>
						</div>
						<span><?php echo $finalMsg;?></span>
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