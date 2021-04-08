<?php

require_once ('process/dbh.php');
$sql = "SELECT employee.id,employee.firstName,employee.lastName,salary.base,salary.bonus,salary.total from employee,`salary` where employee.id=salary.id";

//echo "$sql";
$result = mysqli_query($conn, $sql);

?>



<html>
<head>
	<title>Salary Table </title>
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
		
	</div>
	
	<table>
			<tr>
				<th align = "center">EID</th>
				<th align = "center">Name</th>
				
				
				<th align = "center">Base Salary</th>
				<th align = "center">Bonus</th>
				<th align = "center">TotalSalary</th>
				
				
			</tr>
			
			<?php
				while ($employee = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>".$employee['id']."</td>";
					echo "<td>".$employee['firstName']." ".$employee['lastName']."</td>";
					
					echo "<td>".$employee['base']."</td>";
					echo "<td>".$employee['bonus']." %</td>";
					echo "<td>".$employee['total']."</td>";
					
					

				}


			?>
			
			</table>
</body>
</html>