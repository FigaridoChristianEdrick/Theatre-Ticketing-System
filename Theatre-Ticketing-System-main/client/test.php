<?php
$conn = mysqli_connect("localhost", "root", "", "tts_db");

$sqli="SELECT * FROM booked_tbl where play_id='6' && cust_status=1";
			$querys=mysqli_query($conn,$sqli);
			$nums =mysqli_num_rows($querys);
			$total=0;
			while($tro=mysqli_fetch_array($querys)){
				$total=$total+$tro['cust_totalTickets'];
                echo $tro['cust_totalTickets'];
			}

			echo $total;
?>