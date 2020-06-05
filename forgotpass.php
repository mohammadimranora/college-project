<?php
session_start();
require 'connect.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$pass = $pwdmsg = $name = $mail = "";
if (isset($_POST['recover'])) {
	$id = clean_data($_POST['id']);
	$code = clean_data($_POST['code']);

	if ($code == $_SESSION['code']) {

		$sqlrecover = "select password from student_login where sid='$id'";
		$result = mysqli_query($con, $sqlrecover);
		$row = mysqli_fetch_assoc($result);

		if (mysqli_num_rows($result) > 0) {

			$pass = $row["password"];
			$sqlmail = "select name,mail from student_info where sid='$id'";

			$result1 = mysqli_query($con, $sqlmail);

			$row1 = mysqli_fetch_assoc($result1);

			$name = $row1["name"];
			$mailid = clean_data($row1["mail"]);

			$bodypart = '<strong> Hey ' . $name . '<br><p>Recently you have requested for your password<br>Here is your password: ' . $pass;


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
				$mail->addAddress($mailid, $name);     // Add a recipient

				//Content
				$mail->isHTML(true);                                  // Set email format to HTML
				$mail->Subject = 'Password Recovery';
				$mail->Body = $bodypart;

				$mail->send();
				$pwdmsg = 'Your password has been sent to your email';
			} catch (Exception $e) {
				$pwdmsg = 'Message could not be sent';
			}
		} else {
			$pwdmsg = "Invalid User";
		}
	} else {
		$pwdmsg = "Invalid Captcha";
	}
}
function clean_data($data)
{
	$data = trim($data);
	$data = htmlspecialchars($data);
	$data = stripcslashes($data);
	return $data;
}
mysqli_close($con);
?>
<?php require_once "includes/static.header.php" ?>
<?php require_once "includes/menu.header.php" ?>
<?php require_once "includes/navbar.header.php" ?>
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
								<input type="text" value="" class="form-control" placeholder="Enter Your login ID" required name="id" autocomplete="off">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" value="" class="form-control" placeholder="Captcha Here Please" required name="code" autocomplete="off">
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
<?php require_once "includes/foot.footer.php" ?>