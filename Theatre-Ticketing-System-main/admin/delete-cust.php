<?php
	$con = mysqli_connect("localhost", "root", "","tts_db");
    $req=$_GET['req'];
	$id=$_GET['id'];
    $sqli= "SELECT * FROM theatre_tbl where play_id='$req'";
    $sql= "SELECT * FROM booked_tbl where cust_id=$id && play_id='$req'";    
    $que=mysqli_query($con, $sqli);
    $q=mysqli_query($con, $sql);
    $row=mysqli_fetch_array($que);
    $r=mysqli_fetch_array($q);
    $deduct=$row['play_tickets'] - $r['cust_totalTickets']  ;
    

    mysqli_query($con, "UPDATE theatre_tbl set play_tickets=$deduct WHERE play_id=$req");
	mysqli_query($con, "DELETE FROM booked_tbl WHERE cust_id=$id");
	mysqli_query($con, "DELETE FROM history_tbl WHERE history_id=$id");
    echo "<script>alert('Deleted Customer')</script>";
	echo  "<script>window.location.href='play.php?request=".$req."'</script>";
?>