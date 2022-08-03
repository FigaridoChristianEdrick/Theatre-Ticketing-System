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
	<link rel="stylesheet" href="css/play.css">
	<title>Theater Ticketing System</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		.add{
	text-align: center;
	font-size: 24px;
	font-weight: bold;
	text-decoration: underline cyan;
	}
	.tb2{
	display: grid;
	place-items: center;
	padding-bottom: 50px;
	}
	</style>
</head>

<body>
<!-- NAVIGATION SECTION -->
<section class="nav">
	<div class="navigation">
		<div class="image">
		<a href="dashboard.php"><img src="./images/logo.png"></a>
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

<section class="bgd" style="padding-top: 110px;">
	<div class="background">
		<div class="title">
			<a href="play.php?request=<?php echo $_GET['request']?>" class="title"></a>
				
				<p class="dashboardtitle"><?php 
			
					$req=$_GET['request'];

					$s="SELECT * FROM theatre_tbl where play_id='$req'";
					$q=mysqli_query($conn,$s);
					$r=mysqli_fetch_array($q);
					$sql="SELECT * FROM booked_tbl where play_id='$req' ";
					$query=mysqli_query($conn,$sql);
					$row=mysqli_fetch_array($query);
					echo $r['play_title'];
			?></p>
		</div>

		<div class="ticketstatus">
			<p>	
				<?php echo $r['play_tickets'];?>/
				<?php echo $r['ticket_total'];?> 
			</p>
		</div>

		<div class="search-button">
			<form  method="POST"class="example">
					<div class="input-group">
						<input type="text" placeholder="Search Customer Name" name="search" id="custSearch" autocomplete="off">
					</div>
					<div class="input-group">
						<button name= "submit" type="submit" id="button" >Search</button>
					</div>
												
			</form>
		</div>
	</div>
</section>


<div class="history p-3" id="history">
        <h3 class="pb-2">Customer List</h3>
        <div class="table-responsive" id="no-more-tables">
            <table class="table bg-white">
                <thead class="bg-dark text-light">
                    <tr style="text-align: center;">
						<th>Buyer's Name</th>					
						<th>Tickets</th>
						<th>Date Bought</th>
						<th>Paid Status</th>
						<th>Actions</th>
                    </tr>
                </thead>
                <tbody>
				<?php
			 if(isset($_POST['submit']))
				{

					$id = $_POST['search'];
					$sq= "SELECT * from booked_tbl where play_id='$req' && CONCAT (cust_name) like '%".$id."%'" ;
					$search_result=filterTable($sq);
					if(mysqli_num_rows($search_result) > 0)
    				{

      					while ($row = mysqli_fetch_array($search_result))
      					{
							$new_date = date('F d, Y', strtotime($row["cust_date"]));
							if($row['cust_status']==1)
							{	
								echo
									'<tr style="text-align: center;">
										<td>'.$row["cust_name"].'</td>
										<td>'.$row["cust_totalTickets"].'</td>
										<td>'.$new_date.'</td>
										<td>Paid</td>
										<td> 
											<button class="btn btn-secondary w-50" disabled>Paid</button>
										</td>
									</tr>';
							}else{
								echo
									'<tr style="text-align: center;">
										<td>'.$row["cust_name"].'</td>
										<td>'.$row["cust_totalTickets"].'</td>
										<td>N/A</td>
										<td>Unpaid</td>
										<td> 
										<a href="update.php?id='.$row['cust_id'].'&req='.$req.'"><button class="btn btn-primary w-25">Paid</button></a>
										<a href="delete-cust.php?id='.$row['cust_id'].'&req='.$req.'"><button class="btn btn-danger w-25">Delete</button></a>
										</td>
									</tr> ';
							}				
						}
						echo "</table>";
					}else{
						echo
						"<tr>
							<td>No Result</td>
							<td>No Result</td>
							<td>No Result</td>
							<td>No Result</td>
						</tr>";
					}
					mysqli_free_result($search_result);
				} else {
   					$sq="SELECT * FROM booked_tbl where play_id='$req' limit ".$r['ticket_total']."";
    				$search_result = filterTable($sq);
      				if(mysqli_num_rows($search_result) > 0){
      					
      					while ($row = mysqli_fetch_array($search_result))
      					{
						$new_date = date('F d, Y', strtotime($row["cust_date"]));
						if($row['cust_status']==1)
							{	
								echo
									'<tr  style="text-align: center;">
										<td>'.$row["cust_name"].'</td>
										<td>'.$row["cust_totalTickets"].'</td>
										<td>'.$new_date.'</td>
										<td>Paid</td>
										<td> 
											<button class="btn btn-secondary w-50" disabled>Paid</button>
										</td>
									</tr>';
							}else{
								echo
									'<tr  style="text-align: center;">
										<td>'.$row["cust_name"].'</td>
										<td>'.$row["cust_totalTickets"].'</td>
										<td>N/A</td>
										<td>Unpaid</td>
										<td> 
											<a href="update.php?id='.$row['cust_id'].'&req='.$req.'"><button class="btn btn-primary w-25">Paid</button></a>
											<a href="delete-cust.php?id='.$row['cust_id'].'&req='.$req.'"><button class="btn btn-danger w-25">Delete</button></a>
										</td>
									</tr> ';
							}

						}
					}else{
						echo
						"<tr>
							<td>No Data Yet</td>
							<td>No Data Yet</td>
							<td>No Data Yet</td>
							<td>No Data Yet</td>
						</tr>";
					}
				}
				function filterTable($sq)
				{
    				$con= mysqli_connect("localhost", "root","","tts_db");
    				$filter_Result = mysqli_query($con, $sq);
    				return $filter_Result;
				}
			?>			
                </tbody>
            </table>
    </div>
</section>

	<div class="total">
			<p class="ticketsales mt-3">Total Sales : <strong>P<?php
			$sqli="SELECT * FROM booked_tbl where play_id='$req' && cust_status=1";
			$querys=mysqli_query($conn,$sqli);
			$nums =mysqli_num_rows($querys);
			$total=0;
			while($tro=mysqli_fetch_array($querys)){
				$total=$total+$tro['cust_totalTickets'];
			}

			echo $total*$r['play_price'];
		?></strong>
		</div> 
		
		</p>
		
		<br><br><br><br>
	
	
</div>

<script>
	let menutoggle = document.querySelector('.toggle');
	let menubar = document.querySelector('.menubar');

	menubar.onclick = function(){
		menubar.classList.toggle('active');
	}
    
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>






