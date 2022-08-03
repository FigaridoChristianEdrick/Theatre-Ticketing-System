<?php

session_start();
     
    if (isset($_POST["login"]))
    {
        $email = "cinemo083@gmail.com";
        $password = $_POST["password"];
 
        // connect with database
        $conn = mysqli_connect("localhost", "root", "", "tts_db");
        $sql = "SELECT * FROM admin_tbl WHERE admin_email = '$email'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        $row = mysqli_fetch_array($result);

            if (!password_verify($password, $row['admin_pass']))
            {
                echo" <script>alert('Incorrect Password')</script>";
	            echo"<script>window.location.href='index.php'</script>";
            }
            else{
                $_SESSION['admin_email'] = $email;
                echo " <script>alert('Login Successful')</script>";
	        	echo "<script>window.location.href='dashboard.php'</script>";
            }
            
        
    }
?>