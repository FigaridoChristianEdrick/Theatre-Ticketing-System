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
	<title>Cinemo</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="./css/booking.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

<section class="nav">
		<div class="navigation">
			<div class="image">
			<a href="user-dashboard.php"><img src="./images/logo.png"></a>
			</div>

            

			<div class="menubar">
				<div class="box">
					<div class="box-img">
				
					</div>
					<p id="user">
                    <?php 
                    $email=$_SESSION['client_email'];
                    $id=$_GET['request'];
                    $sqli= "SELECT * FROM client_tbl where client_email='$email'";
                    $sql= "SELECT * FROM theatre_tbl where play_id='$id'";
                    $q=mysqli_query($conn, $sql);
                    $que=mysqli_query($conn, $sqli);
                    $row=mysqli_fetch_array($que);
                    $r=mysqli_fetch_array($q);
                    $play_available= ($r["ticket_total"])-($r["play_tickets"]);
                    $new_date = date('F d, Y', strtotime($r["play_date"]));
                    $new_time = date('h:i a', strtotime($r['play_time']));
                    echo "<span>$row[client_fname] $row[client_lname]</span> ";
                    ?>    
                    </p>
				</div>
				<div class="menutoggle">
				</div>
					<ul class="menu">
						<li><a href="settings.php">Settings</a></li>
						<li><a href="about.php">About</a>
						<li><a href="logout.php">Logout</a></li>

					</ul>
			</div>
		</div>
</section>

</tr>
<section>
    <div class="fpass-box">
        <form action="book.php?id=<?php echo $id?>" method="post" class="create">
                <h2>Book Now?</h2>
                <br>
                <div class="right-container">                                       
                    <div class="order"> 
                        <label class="text-uppercase">Event Play:</label>
                        <span> <?php echo $r['play_title']?></span>
                    </div>
                    <div class="order"> 
                        <label class="text-uppercase">Price:</label>

                        <input type='text' name='total' id='total' value='<?php echo $r['play_price'] ?>' style="pointer-events: none; border-bottom: none;">
                    </div>
                    <div class="order"> 
                        <label class="text-uppercase">Quantity:</label>
                        <input name="quantity" type='number' name='qty' id='qty' value='1' min="1" max='<?php echo $play_available?>' />
                        <input type='text' name='price' id='price' value='<?php echo $r['play_price'] ?>' style="display: none;" />
                    </div>
                    <div class="order"> 
                        <label class="text-uppercase">Date Release:</label>
                        <span><?php echo $new_date?></span>
                    </div>
                    <div class="order"> 
                        <label class="text-uppercase">Time Release:</label>
                        <span><?php echo $new_time?></span>
                    </div>
                    <div class="order"> 
                        <label class="text-uppercase">payment method:</label>
                        <select name="payment"id="payment" style="text-align: center;">
                            <option value="Gcash" name="payment">Gcash</option>
                            <option value="On Arrival">On Arrival</option>
                        </select>
                    </div>                                           
                    <br>
                    <div class="right-button">
                    <a href="user-dashboard.php" type="button" class="btn btn-sm btn-secondary w-25">Close</a>
                    <?php
                    if($play_available==0){
                        echo '<button class="btn btn-sm btn-primary w-50" id="create" disabled>Sold Out</button>';
                        
                    }else{
                        echo '<button name="book" type="submit" class="btn btn-sm btn-primary w-50" id="create">Book</button>';
                    }
                    ?>
                    </div>
                </div>    			                                
        </form>
    </div>
</section>

<script src="./js/user-dashboard.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
	$('#qty, #price').on('input', function() {
  var qty = parseInt($('#qty').val());
  var price = parseFloat($('#price').val());
  $('#total').val((qty * price ? qty * price : 0).toFixed(2));
});
</script>
</body>
</html>