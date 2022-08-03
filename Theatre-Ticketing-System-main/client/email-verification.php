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

		<!--ADMIN ACCOUNT HTML CODE -->
 <section>
	<div class="side">
		<div class="left">
			 
		</div>
		<div class="right" id="login">
			<form method="post" class="login active">
				<div class="right-box">
					<h1>Email Verification</h1>
					<div class="right-image">
						<img src="./images/logo.png">
						<p>A verification has been sent to your Email <br><span style="font-size: 14px;">Check your spam folder</span></p>
					</div>
					<div class="right-container">
                		<div class="right-group" style="border: none !important;" >
                    		<input type="email" id="uname" name="email" value="<?php echo $_GET['email']; ?>" disabled style="border-bottom: 2px solid rgba(53, 184, 118, 0.6);" >
                   		
                		</div>
						<div class="right-group">
                    		<input type="text" name="verification_code" id="pword" required="required">
                   			<label for="input" class="form-label">Enter Verification Code</label>
                		</div>
                		<div class="right-button">
						<input type="submit" name="verify_email" value="Verify Email" id="btn" style="width: 100%;">
                		</div>
                		<div class="right-buttom">
							<p>Go to</p>
							<a href="/Theatre-Ticketing-System-main/client/index.php">User Panel!</a>
                		</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
 <!--END OF ADMIN ACCOUNT HTML CODE -->

 <?php
 
    if (isset($_POST["verify_email"]))
    {
        $email = $_GET["email"];
        $verification_code = $_POST["verification_code"];
 
        // connect with database
        $conn = mysqli_connect("localhost", "root", "", "tts_db");
 
        // mark email as verified
        $sql = "UPDATE client_tbl  SET client_verif_at = NOW() WHERE client_email = '" . $email . "' AND client_verif_code = '" . $verification_code . "'";
        $result  = mysqli_query($conn, $sql);
 
        if (mysqli_affected_rows($conn) == 0)
        {
			echo "<script>alert('Email Verification failed.')</script>";
			echo"<script>window.location.href='email-verification.php?email=".$email."'</script>";
        }
 
        echo "<script>alert('You can login now.')</script>";
        echo"<script>window.location.href='index.php'</script>";
    }
 
?>

<script type="text/javascript" src="js/jss.js"></script>
<script type="text/javascript" src="js/admin.js"></script>
</body>
</html>