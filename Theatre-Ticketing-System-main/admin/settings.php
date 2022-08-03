<?php
	$conn = mysqli_connect("localhost", "root", "", "tts_db");
	session_start(); 
	if(!isset($_SESSION['admin_email'])){
		header('location:index.php');
	}

?>
<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./css/settings.css">
	<title>Theater Ticketing System-Settings</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<!--NAVIGATION SECTION -->
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
                    $sqli= "SELECT * FROM admin_tbl where admin_email='$email'";
                    $que=mysqli_query($conn, $sqli);
                    $row=mysqli_fetch_array($que);
                    echo "<span>$row[admin_user]</span> ";
                    ?>   </p>
				</div>
				<div class="menutoggle">
				</div>
					<ul class="menu">
						<li><a href="logout.php">Logout</a></li>

					</ul>
			</div>
		</div>
</section>
<!-- END OF NAVIGATION SECTION -->

<!-- FORM SECTION  -->
<section>
	<form name="frmChange"action="newpass.php" method="post" class="create" onsubmit="return validatePassword()">
	<p class="dashboardtitle">Account Settings</p>
		<div class="title">
			<span style="text-align: center;">Change Password</span>
		</div>
		<div class="form-box">
			<input type="Password" id="tbox" name="oldpass" required>
			<label>Old Password</label>
			<span><i class="fa fa-eye" aria-hidden="true" id="toggle" onclick="showhide();"></i></span>
		</div>
		<div class="form-box">
			<input type="Password" id="tbox1" name="newpass" required>
			<label>New Password</label>
			<span><i class="fa fa-eye" aria-hidden="true" id="toggle1" onclick="showhide1();"></i></span>
		</div>
		<div class="form-box">
			<input type="Password" id="tbox2" name="confpass" required>
			<label>Confirm Password</label>
			<span><i class="fa fa-eye" aria-hidden="true" id="toggle2" onclick="showhide2();"></i></span>
		</div>
		<div class="form-box1">
			<input type="submit" name="update" id="save" value="Save">
			<a href="passreset1.php?email1=<?php echo $email?>">Forgot Password?</a>
		</div>
	</form>
	<br>
	<br>
		
	</form>
</section>
<!-- END OF FORM SECTION  -->

<!-- JAVASCRIPT AND BOOTSTRAP CONNECTION -->
<script type="text/javascript">

	function showhide(){
		var tbox = document.getElementById('tbox');
		var toggle = document.getElementById('toggle');
		if (tbox.type === 'password') {
			tbox.setAttribute('type' , 'text');
			toggle.classList.add('hide')
		}
		else{
			tbox.setAttribute('type' , 'password');
			toggle.classList.remove('hide');
		}
	}
	function showhide1(){
		var tbox = document.getElementById('tbox1');
		var toggle = document.getElementById('toggle1');
		if (tbox.type === 'password') {
			tbox.setAttribute('type' , 'text');
			toggle.classList.add('hide')
		}
		else{
			tbox.setAttribute('type' , 'password');
			toggle.classList.remove('hide');
		}
	}
	function showhide2(){
		var tbox = document.getElementById('tbox2');
		var toggle = document.getElementById('toggle2');
		if (tbox.type === 'password') {
			tbox.setAttribute('type' , 'text');
			toggle.classList.add('hide')
		}
		else{
			tbox.setAttribute('type' , 'password');
			toggle.classList.remove('hide');
		}
	}


	let menutoggle = document.querySelector('.toggle');
	let menubar = document.querySelector('.menubar');

	menubar.onclick = function(){
		menubar.classList.toggle('active');
	}
</script>
</body> 

</html>