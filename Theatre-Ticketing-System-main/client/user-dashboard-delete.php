<?php
	$con = mysqli_connect("localhost", "root", "","tts_db");
	$id=$_GET['id'];
	mysqli_query($con, "DELETE FROM history_tbl WHERE history_id='$id'" );
    echo "<script>alert('History Removed')</script>";
	echo  "<script>window.location.href='user-dashboard.php'</script>";
?>