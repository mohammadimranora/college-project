<?php
session_start();
require_once "../connect.php";
if (!isset($_SESSION['adminid'])) {
	$URL = url()."/index.php";
	header("location: $URL ");
}
?>
<?php require_once "../includes/static.header.php" ?>
<?php require_once "../includes/menu.header.php" ?>
<?php require_once "../includes/user.navbar.header.php" ?>
<div class="container MainContainer">
	<div class="row">
		<?php require_once "../includes/admin.side-bar.php" ?>
		<?php require_once "../includes/admin.body.task.php" ?>
	</div>
</div>
<?php require_once "../includes/foot.footer.php" ?>