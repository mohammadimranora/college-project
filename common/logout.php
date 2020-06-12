<?php
session_start();
session_destroy();
require_once "connect.php";
$URL = url()."/index.php";
header("location: $URL");
?>