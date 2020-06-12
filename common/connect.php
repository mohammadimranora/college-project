<?php
$con = mysqli_connect('localhost', 'root', 'root', 'ocs') or die("Unable to connect");
?>
<?php
function url()
{
	if (isset($_SERVER['HTTPS'])) {
		$protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
	} else {
		$protocol = 'http';
	}
	putenv("PROJECT_ENV=college-project");
	return $protocol . "://" . $_SERVER['HTTP_HOST'] . '/' . getenv("PROJECT_ENV");
}
?>