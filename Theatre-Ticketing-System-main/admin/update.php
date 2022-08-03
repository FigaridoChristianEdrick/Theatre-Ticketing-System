<?php
	$con = mysqli_connect("localhost", "root", "","tts_db");

	$id=$_GET['id'];


	mysqli_query($con, "UPDATE booked_tbl set cust_status=1, cust_date=NOW() WHERE cust_id=$id");
	mysqli_query($con, "UPDATE history_tbl set history_date=NOW(), history_time=NOW() WHERE history_id=$id");
	echo "<script>alert('Successfully Paid')</script>";
	echo  "<script>window.location.href='play.php?request=".$_GET['req']."'</script>";
?>