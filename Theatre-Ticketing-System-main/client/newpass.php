<?php
session_start();
$_SESSION['client_email'];
$connection = mysqli_connect("localhost", "root", "", "tts_db");



if (count($_POST)>0) {

		$result = mysqli_query($connection, "SELECT *from client_tbl WHERE client_email='" . $_SESSION['client_email'] . "'");
		$row = mysqli_fetch_array($result);
		if(password_verify($_POST["oldpass"], $row['client_pass'])){
			if($_POST["confpass"] == $_POST["newpass"]){
				if(!password_verify($_POST["newpass"], $row['client_pass'])){
					$encrypted_password = password_hash($_POST["newpass"], PASSWORD_DEFAULT); 
					mysqli_query($connection, "UPDATE client_tbl set client_pass='" . $encrypted_password . "' WHERE client_email='" . $_SESSION['client_email'] . "'");
					echo "<script>alert('Password Successfully changed')</script>";
					echo "<script>window.location.href='user-dashboard.php'</script>";
				}else{
					echo "<script>alert('This is the old password')</script>";
					echo "<script>window.location.href='settings.php'</script>";
				}
			}else{
				echo"<script>alert('New password and Confirm password is not the same')</script>";
				echo "<script>window.location.href='settings.php'</script>";
			}
		}
		echo"<script>alert('Old password incorrect')</script>";
		echo "<script>window.location.href='settings.php'</script>";

	}

?>