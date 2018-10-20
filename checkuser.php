<?php
	require 'connect.php';
	if (isset($_POST['user_id'])) {
			
			$userid=$_POST['user_id'];
			$CheckDB="SELECT *FROM `user` WHERE user_id='$userid'";
			$result=mysqli_query($con,$CheckDB);
			if (mysqli_num_rows($result)>0) {
				echo "User ID is already Exist. Try other";
			}
			else
			{
				"Available";
			}
		}
		exit();	
?>