<?php
$conn = mysqli_connect("localhost", "root", "", "tts_db");
session_start(); 
date_default_timezone_set("Asia/Manila");
if(!isset($_SESSION['admin_email'])){
	header('location:index.php');
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Theater Ticketing System-Create</title>
<link rel="stylesheet" type="text/css" href="css/create.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>

<!-- NAVIGATION SECTION -->
<section class="nav">
	<div class="navigation">
		<div class="image">
		<a href="dashboard.php"><img src="./images/logo.png"></a>
		</div>
		<div class="menubar">
			<div class="box">
				<div class="box-img">
				</div>
				<p id="user"><?php 
                    $email=$_SESSION['admin_email'];
					$date=date('Y-m-d');
                    $sqli= "SELECT * FROM admin_tbl where admin_email='$email'";
                    $que=mysqli_query($conn, $sqli);
                    $row=mysqli_fetch_array($que);
                    echo "$row[admin_user]";
                    ?></p>
			</div>
			<div class="menutoggle">
			</div>
				<ul class="menu">
					<li><a href="settings.php">Settings</a></li>
					<li><a href="logout.php">Logout</a></li>

				</ul>
		</div>
	</div>
</section>
<!--END OF NAVIGATION SECTION -->

<!-- ADD EVENT CONTENT AND BACKGROUND -->
<section style="padding-top: 90px;" class="bgd">
<div class="bgd-add">
	<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#openModal">
	Add Event
	<i class="fa fa-plus" aria-hidden="true"></i>
</button>
</div>

<!-- MODAL FOR ADD EVENT -->
<div class="modal modal-sm fade" id="openModal" data-bs-backdrop="static">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<p class="dashboardtitle">Create New Event/Play</p>
			</div>
			<div class="modal-body">
	<form action="newPlay.php" method="post" class="create" id="Form">
		<div class="form-box">
			<input id="tbox" type="text" name="event" required>
			<label>Event/Play Title</label>
		</div>
		<div class="form-box">
			<input id="tbox" type="Number" name="price" required>
			<label>Ticket Price</label>
		</div>
		<div class="form-box">
			<input id="tbox" type="date" name="date" min='<?php echo $date; ?>' required>
		</div>
		<div class="form-box">
			<input id="tbox" type="time"  name="time" required>
		</div>
		<div class="form-box">
			<input id="tbox" type="number" name="ticketNo" required>
			<label>Number of Tickets</label>
		<div class="form-box">
	</form>
			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal" onclick="myFunction()" value="Reset form">Close</button>
				<button type="submit" class="btn btn-sm btn-primary" id="create">Create Event</button>
			</div>
		</div>
	</div>
</div>
<!-- END OF MODAL FOR ADD EVENT -->
</section>
<!-- ADD EVENT CONTENT AND BACKGROUND -->

<script type="text/javascript">

//menu navigation animation
let menutoggle = document.querySelector('.toggle');
let menubar = document.querySelector('.menubar');

menubar.onclick = function(){
	menubar.classList.toggle('active');
}

//close reset all input value
function myFunction() {
    document.getElementById("Form").reset();
}
</script>
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>