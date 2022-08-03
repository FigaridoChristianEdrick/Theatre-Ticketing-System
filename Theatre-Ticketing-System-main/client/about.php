<?php
	$conn = mysqli_connect("localhost", "root", "", "tts_db");
	session_start(); 
	if(!isset($_SESSION['client_email'])){
		header('location:index.php');
	}

?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="./css/about.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
    <section class="nav">
		<div class="navigation">
			<div class="image">
			<a href="user-dashboard.php"><img src="./images/logo.png"></a>
			</div>
			<div class="menubar">
				<div class="box">
					<p id="user">
                    <?php 
                    $email=$_SESSION['client_email'];
                    $sqli= "SELECT * FROM client_tbl where client_email='$email'";
                    $que=mysqli_query($conn, $sqli);
                    $row=mysqli_fetch_array($que);
                    echo "<span>$row[client_fname] $row[client_lname]</span> ";
                    ?>
                    </p>
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
<section class="p-5 mt-3">
    <div class="container bg-white text-dark p-5 rounded-3">
        <input type="checkbox" name="" id="check">
        <h1 class="text-uppercase">Theatre Description</h1>
            <p style="text-align: justify !important;"> 
                Theatre Ticketing System is a rapid reservation ticket that may be purchased online right now using Paypal Payment. Using technology like a desktop, laptop, or smart mobile device that can access the internet, the Theatre Ticketing System is a management tool built for time savings. Our aim is to make the most of technology and enhance the hassle free, time management, and relevant method of ticket purchasing.  
            </p>
        <div class="more">
            <p style="text-align: justify !important; margin-top: 10px !important;">
                Our aim is to make the most of technology and enhance the hassle-free, time management, and relevant method of ticket purchasing. Providing the most incredible experience possible, being gratifying, and providing more options for description to make ticket purchases online more accessible. We want to attract attention and engage more potential users to make this application more usable and productive.  A theater ticketing system strives to secure customer data while enabling potential customers to self-book and pay through your website.
            </p> 
        </div>
        <label for="check" class="rounded-3 mt-5"><u>Read More</u></label>


<div class="section pt-5 mt-5">
    <h1 class="text-uppercase">Contacts</h1>
    <div class="box">
            <div class="img">
                <img src="./images/edrick.jpg">
                <h5 class="mt-3 text-dark">Christian Edrick Figarido</h5>
                <p>201911404@gordoncollege.edu.ph</p>
            </div>
            <div class="img">
                <img src="./images/darrel.jpg">
                <h5 class="mt-3 text-dark">Darrell Robrigado</h5>
                <p>201910065@gordoncollege.edu.ph</p>
            </div>
            <div class="img">
                <img src="./images/admin.png">
                <h5 class="mt-3 text-dark">Arvic Marc Reyes</h5>
                <p>201910593@gordoncollege.edu.ph</p>
            </div>
            <div class="img">
                <img src="./images/admin.png">
                <h5 class="mt-3 text-dark">Ronne Ian Ferareza</h5>
                <p>201910482@gordoncollege.edu.ph</p>
            </div>
            <div class="img">
                <img src="./images/admin.png">
                <h5 class="mt-3 text-dark">Theatre Ticketing System</h5>
                <p>cinemo083@gmail.com</p>
            </div>
            <div class="img">
                <img src="./images/admin.png">
                <h5 class="mt-3 text-dark">Mark Russell Trapsi </h5>
                <p>201910709@gordoncollege.edu.ph</p>
            </div>
        </div>
</div>
    </div>


</section>
  
<script type="text/javascript">
	let menutoggle = document.querySelector('.toggle');
	let menubar = document.querySelector('.menubar');

	menubar.onclick = function(){
		menubar.classList.toggle('active');
	}
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>