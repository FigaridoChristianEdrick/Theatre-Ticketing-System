<?php

session_start();
     
    if (isset($_POST["loginn"]))
    {
        $email = $_POST["email1"];
        $password = $_POST["password1"];
 
        // connect with database
        $conn = mysqli_connect("localhost", "root", "", "tts_db");
 
        // check if credentials are okay, and email is verified
        $sql = "SELECT * FROM client_tbl WHERE client_email = '$email'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        $row = mysqli_fetch_array($result);
 
        if ($num == 0)
        {
            echo" <script>alert('Email not found')</script>";
	        echo"<script>window.location.href='index.php'</script>";
        }
        else{
            $user = mysqli_fetch_object($result);
 
            if (!password_verify($password, $row['client_pass']))
            {
                echo" <script>alert('Incorrect Password')</script>";
	            echo"<script>window.location.href='index.php'</script>";
            }
            else{
 
                if ($row['client_verif_at'] == null)
                {
		            echo" <script>alert('Please Verify Your Email First')</script>";
	                echo"<script>window.location.href='email-verification.php?email=" . $email . "'</script>";
                }
                else
                {
                    $_SESSION['client_email'] = $email;
                    echo " <script>alert('Login Successful')</script>";
	        	    echo "<script>window.location.href='user-dashboard.php'</script>";
                }
            }
        }
    }
?>