<?php
	
 
	$conn = mysqli_connect("localhost", "root", "", "tts_db");
	session_start(); 
	if(!isset($_SESSION['admin_email'])){
		header('location:index.php');
	}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/dashboard.css">
		<title>Theater Ticketing System-Dashboard</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>

	<body>

<!-- NAVIGATION SECTION -->
	<section class="nav">
	<div class="navigation">
		<div class="image">
			<a href="dashboard.php">
				<img src="./images/logo.png">
			</a>
		</div>

		<div class="search">
            <div class="search-box">
                <form action="dashboard.php" method="POST"class="example">  
                    <input type="text" name="search" placeholder="search">
                    <button name="submit" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>
            </div>
        </div>

		<div class="menubar">
			<div class="box">
				<div class="box-img">
				</div>
				<p id="user"><?php 
                    $email=$_SESSION['admin_email'];
                    $sqli= "SELECT * FROM admin_tbl where admin_email='$email'";
                    $que=mysqli_query($conn, $sqli);
                    $row=mysqli_fetch_array($que);
                    echo "$row[admin_user]";
                    ?></p>
			</div>
			<div class="menutoggle">
			</div>
				<ul class="menu">
					<li><a href="settings.php">Settings</a></li>
					<!-- <li><a href="#">About</a></li>
					<li><a href="#">Contact</a></li> -->
					<li><a href="logout.php">Logout</a></li>

				</ul>
		</div>
	</div>
</section>
<!--END OFNAVIGATION SECTION -->

<!--TABLE FOR DATABASE OF PLAY TABLES-->
<!--Once clicked, must redirect to clicked table-->
<section style="padding-top: 90px;">
    <div class="bg p-3" style="margin-bottom: 0 !important;">
        <h3 class="pb-2">EVENT TITLES</h3>
        <div class="table-responsive">
            <table class="table bg-white">
                <thead class="bg-dark text-light">
                    <tr>
						<th>Event</th>
						<th>Price</th>
						<th>Date</th>
                        <th>Time</th>
                        <th>Tickets</th>
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
									$new_date = date('F d, Y', strtotime($r["play_date"]));
									$new_time = date('h:i a', strtotime($r['play_time']));
									echo
                            			'<tr style="text-align: center;">
                                			<td data-title="event-play">'.$r["play_title"].'</td>
                                			<td data-title="price">Php'.$r["play_price"].'</td>
                                			<td data-title="date">'.$new_date.'</td>
                                			<td data-title="time">'.$new_time.'</td>
                                			<td data-title="total">'.$r["play_tickets"].'/'.$r["ticket_total"].'</td>
                                			<td data-title="actions" class="actions">
												
                                    			<a href="play.php?request='.$r['play_id'].'" class="btn btn-primary">Records</a>
												<a href="delete.php?request='.$r['play_id'].'"class="btn btn-danger w-0" >Delete</a>
												
                                			</td>
                            			</tr>
										';
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
									$new_date = date('F d, Y', strtotime($r["play_date"]));
									$new_time = date('h:i a', strtotime($r['play_time']));
									echo
                            			'<tr style="text-align: center;">
                                			<td data-title="event-play">'.$r["play_title"].'</td>
                                			<td data-title="price">Php'.$r["play_price"].'</td>
                                			<td data-title="date">'.$new_date.'</td>
                                			<td data-title="time">'.$new_time.'</td>
                                			<td data-title="total">'.$r["play_tickets"].'/'.$r["ticket_total"].'</td>
                                			<td data-title="actions" class="actions">
												
                                    			<a href="play.php?request='.$r['play_id'].'" class="btn btn-primary">Records</a>
												<a href="delete.php?request='.$r['play_id'].'"class="btn btn-danger w-0" >Delete</a>
												
                                			</td>
                            			</tr>
										';
								}
							}else{
								echo "<tr><th>No Theatre Titles Posted</th></tr>";
							}
							
						}
						function filterTable($sql)
						{
    						$connect = mysqli_connect("localhost", "root", "", "tts_db");
    						$filter_Result = mysqli_query($connect, $sql);
    						return $filter_Result;
						}
				?>    
					</tbody>
				</a>
            </table>
			
		</div>
		<div class="add" style="display: grid; place-items: center; width: 100%;">
		<a href="create.php" class="btn btn-success mt-5">Create</a>
		</div>
	</div>
	</div>
</section>
<!--END OF TABLE FOR DATABASE OF PLAY TABLES-->


<!-- JAVASCRIPT LINK AND CONNECTION -->



<script src="./js/user-dashboard1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>