<?php 
	$id = (isset($_GET['id']) ? $_GET['id'] : '');
	require_once ('process/dbh.php');
	 $sql1 = "SELECT * FROM `employee` where id = '$id'";
	 $result1 = mysqli_query($conn, $sql1);
	 $employeen = mysqli_fetch_array($result1);
	 $empName = ($employeen['firstName']);

	$sql = "SELECT id, firstName, lastName,  verify FROM employee, stat WHERE stat.eid = employee.id order by stat.verify desc";
	$sql1 = "SELECT `ans_query`, `date1` FROM `query` WHERE eid = $id and status = 'unseen'";

	$sql2 = "Select * From employee, message Where employee.id = $id and message.id = $id order by message.token";

	$sql3 = "SELECT * FROM `salary` WHERE id = $id";

//echo "$sql";
$result = mysqli_query($conn, $sql);
$result1 = mysqli_query($conn, $sql1);
$result2 = mysqli_query($conn, $sql2);
$result3 = mysqli_query($conn, $sql3);
?>
<?php

require_once ('process/dbh.php');
$sql = "SELECT * from `query` order by date2 desc";

//echo "$sql";
$result = mysqli_query($conn, $sql);

?>


<html>
<head>
	<title>Employee Panel </title>
	<link rel="stylesheet" type="text/css" href="styleemplogin.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster|Montserrat" rel="stylesheet">
</head>
<body>
	
	<header>
		<nav>
			
			<ul id="navli">
				<li><a class="homered" href="eloginwel.php?id=<?php echo $id?>"">HOME</a></li>
				<li><a class="homeblack" href="myprofile.php?id=<?php echo $id?>"">My Profile</a></li>
			
				<li><a class="homeblack" href="resp.php?id=<?php echo $id?>"">Message Admin</a></li>
				<li><a class="homeblack" href="elogin.html">Log Out</a></li>
			</ul>
		</nav>
	</header>
	 
	<div class="divider"></div>
	<div id="divimg">
	<div>
		<!-- <h2>Welcome <?php echo "$empName"; ?> </h2> -->

		    	
    	<table>

			

			

			

		</table>
   
    	


		<h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">Income Status</h2>
    	

    	<table>

			<tr>
				
				<th align = "center">Base Salary</th>
				<th align = "center">Bonus</th>
				<th align = "center">Total Salary</th>
				
			</tr>

			

			<?php
				while ($employee = mysqli_fetch_assoc($result3)) {
					

					echo "<tr>";
					
					
					echo "<td>".$employee['base']."</td>";
					echo "<td>".$employee['bonus']." %</td>";
					echo "<td>".$employee['total']."</td>";
					
				}


				


			?>

		</table>










		<h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">Message Satus</h2>
    	

    	<table>

			<tr>
				
				<th align = "center">Registration Date</th>
				<th align = "center">Messaging Date</th>
				<th align = "center">Total Days</th>
				<th align = "center">Message</th>
				
			</tr>

			

			<?php
				while ($employee = mysqli_fetch_assoc($result2)) {
					$date1 = new DateTime($employee['start']);
					$date2 = new DateTime($employee['end']);
					$interval = $date1->diff($date2);
					$interval = $date1->diff($date2);

					echo "<tr>";
					
					
					echo "<td>".$employee['start']."</td>";
					echo "<td>".$employee['end']."</td>";
					echo "<td>".$interval->days."</td>";
					echo "<td>".$employee['msg1']."</td>";
					
					
				}


				


			?>

		</table>
<br>
<br>
<br>


    	

    	

		<table>
			<tr>

				<th align = "center">Seq.(Unique id)</th>
				<th align = "center">Account Number</th>
				<th align = "center">Comment</th>
				
				
				
				
				
			</tr>

			<?php
				while ($employee = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>".$employee['pid']."</td>";
					echo "<td>".$employee['eid']."</td>";
					echo "<td>".$employee['ans_query']."</td>";
					
					
					
					

				}


			?>

		</table>
		<html>





   
<br>
<br>
<br>
<br>
<br>







	</div>


		</h2>


		
		
	</div>
</body>
</html>