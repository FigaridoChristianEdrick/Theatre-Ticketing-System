<?php

use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;


    require 'vendor/autoload.php';
    
    session_start();
      
        $email = "cinemo083@gmail.com";
 
        // connect with database
        $conn = mysqli_connect("localhost", "root", "", "tts_db");
 
        // check if credentials are okay, and email is verified
        $sql = "SELECT * FROM admin_tbl WHERE admin_email = '$email'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        $row=mysqli_fetch_array($result);
       
        $mail = new PHPMailer(true);

            $_SESSION['admin_email'] = $email;
            $name= $row['admin_user'];
            try{
                $mail ->SMTPDebug = 0;

                $mail -> isSMTP();

                $mail ->Host = 'smtp.gmail.com';

                $mail ->SMTPAuth = true;

                $mail ->Username = $email;

                $mail ->Password = 'iabvcancjmjzbsxv';

                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

                $mail->Port = 587;

                $mail->setFrom($email, 'Cinemo.com');

                $mail->addAddress($email, $name);

                $mail->isHTML(true);

                $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

                $mail->Subject = 'Reset Password';
                $mail->Body    = '<p>Hi '.$name.'! Your password reset verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';

                $mail->send();

                $reg= " UPDATE admin_tbl SET admin_verif_code = $verification_code WHERE admin_email = '$email'";	
                mysqli_query($conn, $reg);
            

                header("Location: reset-password.php");
                exit();
            } 
            catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        
        

?>