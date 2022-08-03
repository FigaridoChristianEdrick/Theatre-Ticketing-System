<?php
	use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;


    require 'vendor/autoload.php';

    $conn = mysqli_connect("localhost", "root", "", "tts_db");
	session_start(); 
	if(!isset($_SESSION['client_email'])){
		header('location:index.php');
	}

    if (isset($_POST['book'])) {

		$email = $_SESSION['client_email'];
        $quantity= $_POST['quantity'];
        $payment= $_POST['payment'];
        $id=$_GET['id'];
        $s= " SELECT * from client_tbl where client_email= '$email' " ;
        $sql ="SELECT * FROM theatre_tbl where play_id='$id'";
        $a= mysqli_query($conn, $s);
        $b=mysqli_query($conn,$sql);
        $r= mysqli_fetch_array($a);
        $ro= mysqli_fetch_array($b);
        $name = $r['client_fname'];
        $name .=" ".$r['client_lname'];
        $bought=$ro['play_tickets'];
        $event=$ro['play_title'];
        $price= $ro['play_price'];
        $ticket_left= $bought+$quantity;
        

        $result = mysqli_query($conn, $s);

        $num = mysqli_num_rows($result);

        $mail = new PHPMailer(true);

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

            $mail->addAddress($email, $name);

            $mail->isHTML(true);

            while(1){
                $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
                $sq= "SELECT * FROM booked_tbl where cust_unique_code=$verification_code";
                $result = mysqli_query($conn, $sq);
                $nu = mysqli_num_rows($result);
                if ($nu == 0){
                    break; 
                }
            }
            
            $mail->Subject = 'Unique Code of purchase';
            $mail->Body    = '<p>Hi '.$name.'! Your unique code for '.$event.' is: <b style="font-size: 30px;">' . $verification_code . ' please screenshot for proof</b></p>';

            $mail->send();             
            $client=$r['client_id'];
            $total_paid=$quantity*$price;
            if ($payment=="Gcash"){
                $reg= " INSERT into booked_tbl(cust_name, cust_date, cust_status, play_id, cust_unique_code, cust_totalTickets, cust_totalPaid) values ( '$name',  NOW() , '1', $id , $verification_code, $quantity, $total_paid)";	
                $re= " INSERT into history_tbl(client_id, history_date,  history_payment,play_id, play_title, history_quantity, history_total, history_time) values ($client, NOW() , '$payment',$id,'$event',$quantity,$total_paid, NOW())";	
                mysqli_query($conn, $reg);
                mysqli_query($conn,$re);
            }if($payment=="On Arrival"){
                $reg= " INSERT into booked_tbl(cust_name, cust_date, cust_status, play_id, cust_unique_code, cust_totalTickets, cust_totalPaid) values ( '$name',  NULL ,'0', $id , $verification_code, $quantity, NULL)";	
                $re= " INSERT into history_tbl(client_id, history_date,  history_payment, play_id, play_title, history_quantity,history_total,history_time) values ($client, NULL ,  '$payment' ,$id,'$event',$quantity,$total_paid, NULL)";	
                mysqli_query($conn, $reg);
                mysqli_query($conn,$re);
            }
            
            $res="UPDATE theatre_tbl SET play_tickets=$ticket_left where  play_id =$id ";
	       
            
            mysqli_query($conn,$res);
            echo "<script>alert('Successfully booked a Ticket, Check your email for Ticket Code and Screenshot')</script>";
			echo "<script>window.location.href='user-dashboard.php'</script>";
            
            
        } 
        catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }         


    
?>



