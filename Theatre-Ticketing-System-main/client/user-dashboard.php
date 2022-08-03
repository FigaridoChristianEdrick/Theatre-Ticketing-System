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
	<link rel="stylesheet" type="text/css" href="./css/user-dashboard.css">
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

            <div class="search">
                <div class="search-box">
                    <form action="user-dashboard.php" method="POST"class="example">  
                        <input type="text" name="search" placeholder="search">
                        <button name="submit" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>
            </div>

			<div class="menubar">
				<div class="box">
					<div class="box-img">
				
					</div>
					<p id="user">
                    <?php 
                    $email=$_SESSION['client_email'];
                    $sqli= "SELECT * FROM client_tbl where client_email='$email'";
                    $que=mysqli_query($conn, $sqli);
                    $row=mysqli_fetch_array($que);
                    $client=$row['client_id'];
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

<section style="padding-top: 90px;">
    <div class="bg p-3" style="margin-bottom: 0 !important;">
        <h3 class="pb-2">Theater Book List</h3>
        <div class="table-responsive">
            <table class="table bg-white">
                <thead class="bg-dark text-light">
                '<tr style="text-align: center; gap: margin-right: 100px;">
                        <th>Event</th>
                        <th>Price</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Avail Tickets</th>
                        <th>Total Tickets</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php			
				if(isset($_POST['submit']))
				{
					$id = $_POST['search'];
					$sql= "SELECT * from theatre_tbl where CONCAT (play_title) like '%".$id."%'" ;
					$search_result=filterTable($sql);
                    
					if(mysqli_num_rows($search_result) > 0)
    				{
      					while ($r= mysqli_fetch_array($search_result))
      					{
                            $play_available= ($r["ticket_total"])-($r["play_tickets"]);
                            $new_date = date('F d, Y', strtotime($r["play_date"]));
                            $new_time = date('h:i a', strtotime($r['play_time']));
							echo
                            '<tr style="text-align: center; gap: margin-right: 100px;">
                                <td data-title="event-play">'.$r["play_title"].'</td>
                                <td data-title="price">Php'.$r["play_price"].'</td>
                                <td data-title="date">'.$new_date.'</td>
                                <td data-title="time">'.$new_time.'</td>
                                <td data-title="available">'.$play_available.'</td>
                                <td data-title="total">'.$r["ticket_total"].'</td>';?>
                                <?php 
                                if($play_available!=0){
                                    echo '
                                <td data-title="actions" class="actions">
                                <a href="booking.php?request='.$r['play_id'].'"><button class="btn btn-primary w-50"">Book</button></a>
                                </td>';
                                }else{
                                echo'<td data-title="actions" class="actions">
                                    <button class="btn btn-secondary w-75" disabled>Sold Out</button>
                                </td>';
                                }
                                
						}
					}else{
						echo "<tr><th><div class='text-center'>No Result</div></th></tr>";
					}
					mysqli_free_result($search_result);
				} else {
   					$sql = "SELECT * FROM theatre_tbl";
    				$search_result = filterTable($sql);
                    if(mysqli_num_rows($search_result) > 0)
    				{
      					while ($r= mysqli_fetch_array($search_result))
      					{
                            $play_available= ($r["ticket_total"])-($r["play_tickets"]);
                            $new_date = date('F d, Y', strtotime($r["play_date"]));
                            $new_time = date('h:i a', strtotime($r['play_time']));
							echo
                            '<tr style="text-align: center; gap: margin-right: 100px;">
                                <td data-title="event-play">'.$r["play_title"].'</td>
                                <td data-title="price">Php'.$r["play_price"].'</td>
                                <td data-title="date">'.$new_date.'</td>
                                <td data-title="time">'.$new_time.'</td>
                                <td data-title="available">'.$play_available.'</td>
                                <td data-title="total">'.$r["ticket_total"].'</td>
                                <td data-title="actions" class="actions">';?>
                                <?php 
                                if($play_available!=0){
                                    echo '
                                <a href="booking.php?request='.$r['play_id'].'"><button class="btn btn-primary w-50"">Book</button></a>
                                '; 
                                }else{
                                echo'
                                    <button class="btn btn-secondary w-75" disabled>Sold Out</button>
                                ';
                                }
                                echo '</td>
                            </tr>
                            
                            ';
						}
					}else{
						echo "<tr><th>No Theatre Titles Posted</th></tr>";
					}
					
				}
				
			?>    
        </tbody>
    </table>      
                   

<!--Modal For Update Book List -->
    <div class="modal modal-sm fade" id="openModal" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
					<p class="dashboardtitle">Update Book List</p>
                </div>
                <div class="modal-body">
                    <form action="newPlay.php" method="post" class="create">
                        <label>Ticket Quantity</label>
                        <input type="number" value="0">
                        <label>Total Price</label>
                        <span></span>
                    </form>
                    <br>
                </div>
                <div class="modal-footer">
				    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sm btn-primary viewbtn" id="create">Update</button>
                </div>
            </div>
        </div>
    </div>
<!--End Modal For Update Book List -->

</div>
</div>
</section>

<!-- History Table Format -->
<div class="history p-3" id="history" >
        <h3 class="pb-2">History</h3>
        <div class="table-responsive" id="no-more-tables">
            <table class="table bg-white">
                <thead class="bg-dark text-light">
                    <tr>
                        <th>Event</th>
                        <th>Date Bought</th>
                        <th>Payment Method</th>
                        <th>Time</th>
                        <th>Quantity Order</th>
                        <th>Total Amount</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php			
				if(isset($_POST['submit']))
				{
					$id = $_POST['search'];
					$sql= "SELECT * from history_tbl  where client_id=$client && CONCAT (play_title) like '%".$id."%' " ;
					$search_result=filterTable($sql);
                    
					if(mysqli_num_rows($search_result) > 0)
    				{
                        while ($rowe= mysqli_fetch_array($search_result))
                        {
                          $new_date = date('F d, Y', strtotime($rowe["history_date"]));
                          $new_time = date('h:i a', strtotime($rowe['history_time']));
                       
                          echo
                          '<tr style="text-align: center; gap: margin-right: 100px;">
                              <td data-title="event-play">'.$rowe["play_title"].'</td>';?>
                              <?php if($rowe['history_date']!=NULL){
                              echo'
                              <td data-title="date">'.$new_date.'</td>
                              <td data-title="payment">'.$rowe["history_payment"].'</td>                                
                              <td data-title="time">'.$new_time.'</td>
                              <td data-title="quantity">'.$rowe['history_quantity'].'</td>
                              <td data-title="total">Php '.$rowe["history_total"].'</td>';
                              }else{
                                  echo'
                              <td data-title="date">To be paid</td>
                              <td data-title="payment">'.$rowe["history_payment"].'</td>                                
                              <td data-title="time">To be paid</td>
                              <td data-title="quantity">'.$rowe['history_quantity'].'</td>
                              <td data-title="total">Php '.$rowe["history_total"].' to be paid</td>';
                              };?><?php echo'
                              <td data-title="actions" class="actions">
                              
                              <button class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#delete">Delete</button>
                              
                              
                              </td>
                          </tr>
                          
                          ';
                      }
					}else{
						echo "<tr><th><div class='text-center'>No Result</div></th></tr>";
					}
					mysqli_free_result($search_result);
				} else {
   					$sql = "SELECT * FROM history_tbl where client_id=$client";
    				$search_result = filterTable($sql);
                    if(mysqli_num_rows($search_result) > 0)
    				{
      					while ($rowe= mysqli_fetch_array($search_result))
      					{
                            $new_date = date('F d, Y', strtotime($rowe["history_date"]));
                            $new_time = date('h:i a', strtotime($rowe['history_time']));
                         
							echo
                            '<tr style="text-align: center; gap: margin-right: 100px;">
                                <td data-title="event-play">'.$rowe["play_title"].'</td>';?>
                                <?php if($rowe['history_date']!=NULL){
                                echo'
                                <td data-title="date">'.$new_date.'</td>
                                <td data-title="payment">'.$rowe["history_payment"].'</td>                                
                                <td data-title="time">'.$new_time.'</td>
                                <td data-title="quantity">'.$rowe['history_quantity'].'</td>
                                <td data-title="total">Php '.$rowe["history_total"].'</td>';
                                }else{
                                    echo'
                                <td data-title="date">To be paid</td>
                                <td data-title="payment">'.$rowe["history_payment"].'</td>                                
                                <td data-title="time">To be paid</td>
                                <td data-title="quantity">'.$rowe['history_quantity'].'</td>
                                <td data-title="total">Php '.$rowe["history_total"].' to be paid</td>';
                                };?><?php echo'
                                <td data-title="actions" class="actions">
                                
                                <a href="user-dashboard-delete.php?id='.$rowe['history_id'].'"><button class="btn btn-danger w-100" >Delete</button></a>
                                
                                
                                </td>
                            </tr>
                            
                            ';
						}
					}else{
						echo "<tr><th>No Event booked yet</th></tr>";
					}
					
				}
				
			?>
                </tbody>
            </table>
    </div>


<?php
function filterTable($sql)
{
    $connect = mysqli_connect("localhost", "root", "", "tts_db");
    $filter_Result = mysqli_query($connect, $sql);
    return $filter_Result;
}
?>
<!-- End History Table Format -->
<script src="./js/user-dashboard.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>