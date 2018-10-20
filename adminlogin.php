<?php
	require 'connect.php';
	session_start();
	$errLogin="";
	
	if (isset($_POST['login'])) {

		$userid=clean_data($_POST['userid']);
		$pass=clean_data($_POST['password']);
		$captcha=clean_data($_POST['captcha']);

		$sql="select *from user where user_id='$userid' AND password='$pass'";
		$result=mysqli_query($con,$sql);
		if (mysqli_num_rows($result)==1) {
			
			if ($captcha==$_SESSION['code']) {
				
				$_SESSION['adminid']=$userid;
				$row=mysqli_fetch_array($result);
				$_SESSION['username']=$row[1];
				$_SESSION['type']=$row[5];

				if ($row['type']=='cac' || $row['type']=='Cac' || $row['type']=='CAC') {
					
					header('location: cacindex.php');
				}
				elseif ($row['type']=='dac' || $row['type']=='Dac' || $row['type']=='DAC') {
					
					header('location: dacindex.php');
				}
				elseif ($row['type']=='admin' || $row['type']=='Admin' || $row['type']=='ADMIN') {
					
					header('location: adminindex.php');
				}
			}
			else
			{
				$errLogin="Invalid Captcha";
			}
		}
		else{
			$errLogin="Either Your User ID Or Password is wrong";
				
		}
		
	}
	function clean_data($data)
	{
		$data=trim($data);
		$data=htmlspecialchars($data);
		$data=stripcslashes($data);

		return $data;
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  		<title>Administrative Login | OCS</title>
 		<meta name="viewport" content="width=device-width, initial-scale=1">
 		<link rel="stylesheet" href="./index_files/bootstrap.min.css">
 		<link rel="stylesheet" href="./index_files/custom.css">
 		<script src="./index_files/jquery.min.js.download"></script>
 		<script src="./index_files/bootstrap.min.js.download"></script>	
 		<link rel="stylesheet" type="text/css" href="./index_files/custom1.css">
 		<script type="text/javascript">
 			function loginValidate()
 			{
 				var id=document.getElementById("userid").value;
 				var pass=document.getElementById("password").value;
 				var captcha=document.getElementById("captcha").value;

 				if (id=="" || id==null) {
 					alert("Please Enter your User ID");
 					userid.focus();
 					return false;
 				}
 				if (pass=="" || pass==null) {
 					alert("Please Enter your Password");
 					password.focus();
 					return false;
 				}
 				if (captcha=="" || captcha==null) {
 					alert("Please Enter Captcha");
 					captcha.focus();
 					return false;
 				}
 			}
 		</script>
 	</head>
<body>

<div>
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
			
		</div>
		<div class="col-sm-6">
			<div class="panel panel-primary">
				<div class="panel-heading"><h5>Administrative Login</h5></div>
				<div class="panel-body">
					<span style="color: red; font-weight: bold;"><?php echo "$errLogin" ?></span>
					<form class="form-horizontal" method="post" accept-charset="utf-8" action="">
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" name="userid" autocomplete="off" id="userid" class="form-control" placeholder="User Id" required="">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="password" name="password" autocomplete="off" id="password" class="form-control" placeholder="Password" required="">
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
						<div class="form-group">
							<div class="col-sm-12">
								<button type="submit" name="login" value="login" class="btn btn-primary" onclick="loginValidate()">Login</button>
								<button type="reset" name="reset" class="btn btn-primary">Clear</button>
								
							</div>							
						</div>

						
					</form>
				</div>
				<div class="panel-footer">
					<a href="adminforgetpassword.php">Forget Password ?</a>							
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