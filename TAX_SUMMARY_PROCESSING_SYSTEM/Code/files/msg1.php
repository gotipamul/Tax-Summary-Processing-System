<?php

require_once ('process/dbh.php');


$sql = "Select employee.id, employee.firstName, employee.lastName, message.start, message.end, message.msg1, message.status, message.token From employee, message Where employee.id = message.id order by message.token";

//echo "$sql";
$result = mysqli_query($conn, $sql);

?>



<html>
<head>
	<title> Admin Panel </title>
	<link rel="stylesheet" type="text/css" href="styleview.css">
</head>
<body>
	
	<header>
		<nav>
			
			<ul id="navli">
				<li><a class="homeblack" href="aloginwel.php">Home</a></li>
				<li><a class="homeblack" href="c.html">Calculate Tax</a></li> 
				  <li><a class="homeblack" href="addemp.php">Add User</a></li>
                <li><a class="homeblack" href="viewemp.php">View User</a></li>
				<li><a class="homeblack" href="msg1.php">User Questions</a></li>
				<li><a class="homeblack" href="assign.php">Reply user</a></li>
				<li><a class="homeblack" href="salaryemp.php">Salary Table</a></li>
				<li><a class="homeblack" href="alogin.html">Log Out</a></li>
			</ul>
		</nav>
	</header>
	 
	<div class="divider"></div>
	<div id="divimg">
		<table>
			<tr>
				<th>EID</th>
				<th>Token</th>
				<th>Name</th>
				<th>Registration Date</th>
				<th>Messaging Date</th>
				<th>Total Days</th>
				<th>Message</th>
				
				<th></th>
			</tr>

			<?php
				while ($employee = mysqli_fetch_assoc($result)) {

				$date1 = new DateTime($employee['start']);
				$date2 = new DateTime($employee['end']);
				$interval = $date1->diff($date2);
				$interval = $date1->diff($date2);
				//echo "difference " . $interval->days . " days ";

					echo "<tr>";
					echo "<td>".$employee['id']."</td>";
					echo "<td>".$employee['token']."</td>";
					echo "<td>".$employee['firstName']." ".$employee['lastName']."</td>";
					
					echo "<td>".$employee['start']."</td>";
					echo "<td>".$employee['end']."</td>";
					echo "<td>".$interval->days."</td>";
					echo "<td>".$employee['msg1']."</td>";
					
					echo "<td><a href=\"approve.php?id=$employee[id]&token=$employee[token]\"  onClick=\"return confirm('Are you sure you want to Approve the request?')\"></a> | <a href=\"cancel.php?id=$employee[id]&token=$employee[token]\" onClick=\"return confirm('Are you sure you want to Canel the request?')\"></a></td>";

				}


			?>

		</table>
		
	</div>
</body>
</html>