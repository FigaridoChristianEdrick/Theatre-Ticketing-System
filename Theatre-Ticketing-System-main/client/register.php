<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;


    require 'vendor/autoload.php';

    $connect = mysqli_connect("localhost", "root", "", "tts_db");

	if (isset($_POST['loginnn'])) {

		$email = $_POST['email'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $password = $_POST['passworddd'];
		$confpass = $_POST['confpass'];

        $s= " SELECT * from client_tbl where client_email= '$email' " ;

        $result = mysqli_query($connect, $s);

        $num = mysqli_num_rows($result);

        $mail = new PHPMailer(true);

        if($confpass==$password){
            if( $num == 0){
                try{
                    $mail ->SMTPDebug = 0;

                    $mail -> isSMTP();

                    $mail ->Host = 'smtp.gmail.com';

                    $mail ->SMTPAuth = true;

                    $mail ->Username = 'cinemo083@gmail.com';

                    $mail ->Password = 'iabvcancjmjzbsxv';

                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

                    $mail->Port = 587;

                    $mail->setFrom('cinemo083@gmail.com', 'Cinemo.com');

                    $mail->addAddress($email, $fname);

                    $mail->isHTML(true);

                    $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

                    $mail->Subject = 'Email verification';
                    $mail->Body    = '<p>Hi '.$fname.'! Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';

                    $mail->send();

                    $encrypted_password = password_hash($password, PASSWORD_DEFAULT);

                

                    $reg= " INSERT into client_tbl(client_email, client_fname, client_lname, client_pass, client_verif_code, client_verif_at) values ('$email', '$fname','$lname','$encrypted_password', $verification_code, NULL)";	
	                mysqli_query($connect, $reg);
                    echo " <script>alert('Account Successfully Created')</script>";
                

                    header("Location: email-verification.php?email=" . $email);
                    exit();
                } 
                catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            }
            else{
                echo" <script>alert('Email already exists')</script>";
                echo"<script>window.location.href='index.php'</script>";
            }
        }
        else{
            echo" <script>alert('Password does not match')</script>";
	        echo"<script>window.location.href='index.php'</script>";
        }
    }
?>