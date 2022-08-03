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
    	<meta charset ="utf-8">
	    <meta http-equiv ="X-UA-Compatible" content ="IE=edge">
	    <meta name ="viewport" content ="width=device-width, initial-scale=1.0">
	    <title>Theatre Ticketing</title>
	    <link rel="stylesheet" href="css/forgot-password.css">
	    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
<body>
    <section>
        <div class="fpass-box">
            <form method="post" class="login active">
				<div class="right-box">
					<h2>Reset Password</h2>
					<div class="right-image">
						<img src="./images/logo.png">
						<p>A verification has been sent to your Email <br><span style="font-size: 14px;">Check your spam folder</span></p>
					</div>
					<div class="right-group" style="border: none !important;">
						<input type="email" id="uname" name="email" value="<?php echo $_SESSION['client_email']; ?>" disabled style="border-bottom: 2px solid rgba(53, 184, 118, 0.6);" >
                		</div>
						<div class="right-group">
                    		<input type="text"required="required" name="verification_code">
                   			<label for="input" class="form-label">Enter Verification</label>
                		</div>
						<div class="right-group">
                    		<input type="password" name="passu" required="required" id="pword4">
                   			<label for="input" class="form-label">Password</label>
							   <span><i class="fa fa-eye" aria-hidden="true" id="toggle0" onclick="showhide4();"></i></span>
                		</div>
                        <div class="right-group">
                    		<input type="password" name="passwordddd" id="confpass" required="required" >
                   			<label for="input" class="form-label">Confirm Password</label>
							   <span><i class="fa fa-eye " aria-hidden="true" id="toggle1" onclick="showhide5();"></i></span>
                		</div>
                		<div class="right-button mb-4">
						<input type="submit" name="resetpass" id="btn">
                		</div>
					</div>
				</div>
			</form>
        </div>
    </section>

	<?php
 
    if (isset($_POST["resetpass"]))
    {
        $email = $_SESSION["client_email"];
		$pass =$_POST['passu'];
		$cpass=$_POST['passwordddd'];
        $verification_code = $_POST["verification_code"];
		
        // connect with database
		if($pass == $cpass){
			$s= " SELECT * from client_tbl where client_email= '$email' " ;
			$res = mysqli_query($conn, $s);
			$r= mysqli_fetch_array($res);
			if(password_verify($pass, $r['client_pass'])){
				echo "<script>alert('You entered an old password.')</script>";
        		echo"<script>window.location.href='reset-password.php?email=".$email."'</script>";
			}
			else{
				if($verification_code==$r['client_verif_code']){
					$encrypted_password = password_hash($pass, PASSWORD_DEFAULT); 
        			$sql = "UPDATE client_tbl  SET client_pass = '$encrypted_password'   WHERE client_email = '" . $email . "' AND client_verif_code = '" . $verification_code . "'";
        			$result  = mysqli_query($conn, $sql);
					
					
        			if (mysqli_affected_rows($conn) == 0)
        			{
			            die("Verification code failed.");
        			}
					
		        	echo "<script>alert('Successfully changed password. You can login now.')</script>";
					session_destroy();
        			echo"<script>window.location.href='index.php'</script>";
					
				}
				else{
					echo "<script>alert('Verification did not match.')</script>";
        			echo"<script>window.location.href='reset-password.php?email=".$email."'</script>";
				}
				
			}
		}
		else{
			echo "<script>alert('Password did not match.')</script>";
        	echo"<script>window.location.href='reset-password.php?email=".$email."'</script>";
		}
    }
 
?>

    <script type="text/javascript" src="js/resetpassword.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

