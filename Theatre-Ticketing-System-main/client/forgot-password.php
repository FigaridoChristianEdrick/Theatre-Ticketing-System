<!DOCTYPE html>
<html>
	<head>		
    	<meta charset ="utf-8">
	    <meta http-equiv ="X-UA-Compatible" content ="IE=edge">
	    <meta name ="viewport" content ="width=device-width, initial-scale=1.0">
	    <title>Theatre Ticketing</title>
	    <link rel="stylesheet" href="css/forgot-password.css">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
<body>
    <section>
        <div class="fpass-box">
            <form action="passreset.php" method="post" class="login active">
				<div class="right-box">
					<h2>Reset Password</h2>
					<div class="right-image">
						<img src="./images/logo.png">
						<p>Theater Ticketing System</p>
					</div>
					<div class="right-container">
                		<div class="right-group">
                    		<input type="email"required="required" name="email1">
                   			<label for="input" class="form-label">Email</label>
                		</div>
                		<div class="right-button">
						<input type="submit" name="login" id="btn" >
                		</div>
                		<div class="back">
							<a href="index.php">Back</a>
                		</div>
					</div>
				</div>
			</form>
        </div>
    </section>

    <script type="text/javascript" src="js/forgotpass.js"></script>
	
</body>
</html>

