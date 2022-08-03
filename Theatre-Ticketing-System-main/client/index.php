<!DOCTYPE html>
<html>
	<head>		
	<meta charset ="utf-8">
	<meta http-equiv ="X-UA-Compatible" content ="IE=edge">
	<meta name ="viewport" content ="width=device-width, initial-scale=1.0">
	<title>Theatre Ticketing</title>
	<link rel="stylesheet" href="css/admin.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>

<!--backend para di kayo malito naka comment na start and end ng code ng account, admin and user account. salamat -->

 

  <!--USER ACCOUNT HTML CODE -->
<section>
	<div class="side">
		<div class="left" id="lftt">

		</div>
		<div class="right" id="login1">
			<form action="login.php" method="post" class="login1 active" id="ptt">
				<div class="right-box">
					<h1>User Account</h1>
					<div class="right-image">
						<img src="./images/logo.png">
						<p>Theater Ticketing System<br><span style="font-size: 14px;">Login Now!</span></p>
					</div>
					<div class="right-container">
                		<div class="right-group">
                    		<input type="email" id="unamee" name="email1" required="required" >
                   			<label for="input" class="form-label">Email</label>
                		</div>
						<div class="right-group">
                    		<input type="password" name="password1" id="pword" required="required">
                   			<label for="input" class="form-label">Password</label>
							   <span><i class="fa fa-eye" aria-hidden="true" id="toggle" onclick="showhide();"></i></span>
                		</div>
                		<div class="right-button">
						<input type="submit" name="loginn" id="btnn">
							<a href="forgot-password.php">Forgot Password?</a>
                		</div>
                		<div class="right-buttom">				
							<p>I don't have an account. <a href="#" onclick="switchForm('register', event)">Register</a></p>
                		</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
 <!--END USER ACCOUNT HTML CODE -->

  <!--cREATE ACCOUNT HTML CODE -->
<section>
	<div class="side">
		<div class="left" id="lft">
			 
		</div>
		<div class="right" id="register">
			<form action="register.php" method="post" class="register" id="pt">
				<div class="right-box">
					<h1>Create Account</h1>
					<div class="right-image">
						<img src="./images/logo.png">
						<p>Theater Ticketing System</p>
					</div>
					<div class="right-container">
                		<div class="right-group">
                    		<input type="email" id="email" name="email" required="required" >
                   			<label for="input" class="form-label">Email</label>
                		</div>
						<div class="right-container">
                		<div class="right-group">
                    		<input type="text" id="unameee" name="fname" required="required" >
                   			<label for="input" class="form-label">First name</label>
                		</div>
						<div class="right-container">
						<div class="right-group">
                    		<input type="text" id="unameee" name="lname" required="required" >
                   			<label for="input" class="form-label">Last name</label>
                		</div>
						<div class="right-container">
							<div class="right-group">
                    			<input type="password" name="passworddd" id="regpass" required="required">
                   				<label for="input" class="form-label">Password</label>
								   <span><i class="fa fa-eye" aria-hidden="true" id="toggle1" onclick="showhide1();"></i></span>   
                			</div>	
						</div>
						<div class="right-container">
							<div class="right-group">
                    			<input type="password" id="cpword" required="required" name="confpass">
                   				<label for="input" class="form-label">Confirm Password</label>
								   <span><i class="fa fa-eye" aria-hidden="true" id="toggle2" onclick="showhide2();"></i></span>   
                			</div>	
                			</div>
						</div>
                		<div class="right-button">
						<input type="submit" name="loginnn" id="btnnn" style="width: 100%;">
                		</div>
                		<div class="right-buttom">
							<p>Already have an account? <a href="#" onclick="switchForm('login1', event)">Login</a></p>
                		</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>


<script type="text/javascript" src="js/animate.js"></script>
<script type="text/javascript" src="js/index.js"></script>
	</body>
</html>