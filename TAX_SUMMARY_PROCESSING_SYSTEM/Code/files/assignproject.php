<?php

require_once ('process/dbh.php');
$sql = "SELECT * from `query` order by date2 desc";

//echo "$sql";
$result = mysqli_query($conn, $sql);

?>



<html>
<head>
	<title>Admin Panel</title>
	<link rel="stylesheet" type="text/css" href="styleview.css">
</head>
<body>
	<header>
		<nav>
			<ul id="navli">
				<li><a class="homeblack" href="aloginwel.php">Home</a></li>
				<li><a class="homeblack" href="c.html">Calculate Tax</a></li> 
				<li><a class="homeblack" href="addemp.php">Add Employee</a></li>
				<li><a class="homeblack" href="viewemp.php">View Employee</a></li>
				<li><a class="homeblack" href="msg1.php">User Questions</a></li>
				<li><a class="homeblack" href="assign.php">Reply user</a></li>
				<li><a class="homeblack" href="salaryemp.php">Salary Table</a></li>
				<li><a class="homeblack" href="alogin.html">Log Out</a></li>
			</ul>
		</nav>
	</header>
	
	<div class="divider"></div>

		<table>
			<tr>

				<th align = "center">Seq.(Unique id)</th>
				<th align = "center">Account Number</th>
				<th align = "center">Comment</th>
				
				<th align = "center"></th>
				
			</tr>

			<?php
				while ($employee = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>".$employee['pid']."</td>";
					echo "<td>".$employee['eid']."</td>";
					echo "<td>".$employee['ans_query']."</td>";
					
					echo "<td><a href=\"mark.php?id=$employee[eid]&pid=$employee[pid]\"></a>"; 

				}


			?>

		</table>
		
	
</body>
</html>