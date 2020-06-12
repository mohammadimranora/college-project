<?php
require_once "../common/connect.php";
session_start();
if (!isset($_SESSION['userid'])) {
	$URL = url()."/index.php";
	header("location: $URL ");
}
$pic = $_SESSION["UserData"]["pic"];
?>
<?php require_once "../includes/static.header.php" ?>
<?php require_once "../includes/menu.header.php" ?>
<?php require_once "../includes/user.navbar.header.php" ?>
<div class="container MainContainer">
	<div class="row">
		<?php require_once "../includes/student.side-bar.php" ?>
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
<?php require_once "../includes/foot.footer.php" ?>