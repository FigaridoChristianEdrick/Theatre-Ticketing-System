<!DOCTYPE html>
<html>
	<head>		
	<meta charset ="utf-8">
	<meta http-equiv ="X-UA-Compatible" content ="IE=edge">
	<meta name ="viewport" content ="width=device-width, initial-scale=1.0">
	<title>Theater Ticketing System</title>
	<link rel="stylesheet" href="css/admin.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>

		<!--ADMIN ACCOUNT HTML CODE -->
 <section>
	<div class="side">
		<div class="left">
			 
		</div>
		<div class="right" id="login">
			<form action="login.php" method="post" class="login active">
				<div class="right-box">
					<h1>Admin Account</h1>
					<div class="right-image">
						<img src="./images/logo.png">
						<p>Theater Ticketing System<br><span style="font-size: 14px;">Login Now!</span></p>
					</div>
					<div class="right-container">
						<div class="right-group">
                    		<input type="password" name="password" id="pword" required="required">
                   			<label for="input" class="form-label">Password</label>
							   <span><i class="fa fa-eye" aria-hidden="true" id="toggle" onclick="showhide();"></i></span>   
                		</div>
                		<div class="right-button">
						<input type="submit" name="login" id="btn" >
						<a href="passreset1.php">Forgot Password?</a>

                		</div>
                		<div class="right-buttom">
							<p>Go to</p>
							<a href="/Theatre-Ticketing-System/Theatre-Ticketing-System-main/client/index.php">User Panel!</a>
							<p style="margin-top: 50px;">This is Exclusive for Admin page!</p>
                		</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
 <!--END OF ADMIN ACCOUNT HTML CODE -->

<script type="text/javascript" src="js/admin.js"></script>
</body>
</html>