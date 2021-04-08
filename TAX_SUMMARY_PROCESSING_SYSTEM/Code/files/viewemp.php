<?php

require_once ('process/dbh.php');
$sql = "SELECT * from `employee` , `stat` WHERE employee.id = stat.eid";

//echo "$sql";
$result = mysqli_query($conn, $sql);

?>



<html>
<head>
	<title>View Employee |  Admin Panel</title>
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

		<table>
			<tr>

				<th align = "center">eid</th>
				<th align = "center">Pan Card</th>
				<th align = "center">Name</th>
				<th align = "center">Email</th>
				<th align = "center">Date of Birth</th>
				<th align = "center">Gender</th>
				<th align = "center">Contact</th>
				<th align = "center">IFSC code</th>
				<th align = "center">Address</th>
				<th align = "center">Taxable Income</th>
				<th align = "center">Income Tax</th>
				
				
				
				<th align = "center">Options</th>
			</tr>

			<?php
				while ($employee = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>".$employee['id']."</td>";
					echo "<td><img src='process/".$employee['pic']."' height = 60px width = 60px></td>";
					echo "<td>".$employee['firstName']." ".$employee['lastName']."</td>";
					
					echo "<td>".$employee['email']."</td>";
					echo "<td>".$employee['birthday']."</td>";
					echo "<td>".$employee['gender']."</td>";
					echo "<td>".$employee['contact']."</td>";
					echo "<td>".$employee['nid']."</td>";
					echo "<td>".$employee['tot_tax_liability']."</td>";
					echo "<td>".$employee['tax']."</td>";
					echo "<td>".$employee['income_tax']."</td>";
				

					echo "<td><a href=\"edit.php?id=$employee[id]\">Edit</a> | <a href=\"delete.php?id=$employee[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";

				}


			?>

		</table>
		
	
</body>
</html>