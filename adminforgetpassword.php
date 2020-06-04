<?php 
	session_start();
	require 'connect.php';
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	//Load Composer's autoloader
	require 'vendor/autoload.php';

	$pass=$pwdmsg=$name=$email="";
	

	if (isset($_POST['recover'])) {
		$id=clean_data($_POST['id']);
		$code=clean_data($_POST['code']);

		if ($code==$_SESSION['code']) {
				$sqlrecover="select name,email,password from user where user_id='$id'";
				$result=mysqli_query($con,$sqlrecover);
				$row=mysqli_fetch_assoc($result);
				
				if (mysqli_num_rows($result)>0) {
					
						$name=$row["name"];
						$email=$row["email"];
						$pass=$row["password"];

						$bodypart='<strong> Hey'.$name.'<br><p>Recently you have requested for your password<br>Here is your password: '.$pass;


						$mail = new PHPMailer(true);                            // Passing `true` enables exceptions
						try {
				    															//Server settings
							                               // Enable verbose debug output
							    $mail->isSMTP();                                // Set mailer to use SMTP
							    $mail->Host = 'smtp.gmail.com';  				// Specify main and backup SMTP servers
							    $mail->SMTPAuth = true;                         // Enable SMTP authentication
							    $mail->Username = 'helpatocs@gmail.com';        // SMTP username
							    $mail->Password = 'ocs@manuu2017';              // SMTP password
							    $mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
							    $mail->Port = 587;                          // TCP port to connect to

							    //Recipients
							    $mail->setFrom('helpatocs@gmail.com', 'Help Support OCS');
							    $mail->addAddress($email,$name);     // Add a recipient

							    //Content
							    $mail->isHTML(true);                                  // Set email format to HTML
							    $mail->Subject = 'Password Recovery';
							    $mail->Body=$bodypart;

							    $mail->send();
							    $pwdmsg= 'Your password has been sent to your email';
							} 
							catch (Exception $e) {
				    			$pwdmsg='Message could not be sent';
					}
				}
				else
				{
					$pwdmsg="Invalid User ID";
				}
		}
		else
		{
			$pwdmsg="Invalid Captcha";
		}
	}
function clean_data($data)
{
	$data=trim($data);
	$data=htmlspecialchars($data);
	$data=stripcslashes($data);
	return $data;
}
	mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  		<title> Recover Password | OCS</title>
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
		<div class="col-sm-3 col-xs-12">
			
		</div>
		<div class="col-sm-6 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					Password Recovery
				</div>
				<div class="panel-body">
					<span style="color: green; font-weight: bold; margin-left: 10px;"><?php echo "$pwdmsg" ?></span>
					<form action="" class="form-horizontal" method="post" accept-charset="utf-8">
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" value="" class="form-control"  placeholder="Enter Your login ID" required name="id" autocomplete="off">
							</div>
						</div>	
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" value="" class="form-control"  placeholder="Captcha Here Please" required name="code" autocomplete="off">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<img src="captcha.php">
							</div>
						</div>		
						<div class="form-group">
							<div class="col-sm-5 col-sm-7">
								<button type="submit" class="btn btn-primary" name="recover">Recover</button>
								<button type="reset" class="btn btn-primary"> Clear</button>
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