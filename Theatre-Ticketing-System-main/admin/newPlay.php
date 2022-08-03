<?php
session_start();

$con = mysqli_connect("localhost", "root", "", 'tts_db');


$event = $_POST['event'];
$price = $_POST['price'];
$date = $_POST['date'];
$time = $_POST['time'];
$ticketNo = $_POST['ticketNo'];

$s= " SELECT * from theatre_tbl where play_title= '$event' " ;

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if( $num == 1){
	echo" <script>alert('Event already exists')</script>";
	echo"<script>window.location.href='create.php'</script>";
}else{
	$reg= " INSERT into theatre_tbl(play_title, play_price, play_date, play_time, play_tickets, ticket_total) values ('$event', '$price','$date','$time','0','$ticketNo')";	
	mysqli_query($con, $reg);
	echo " <script>alert('Event successfully created')</script>";
	echo "<script>window.location.href='dashboard.php'</script>";
}
?>