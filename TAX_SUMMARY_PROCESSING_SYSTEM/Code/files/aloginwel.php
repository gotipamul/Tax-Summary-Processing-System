<?php 
require_once ('process/dbh.php');
$sql = "SELECT id, firstName, lastName,  verify FROM employee, stat WHERE stat.eid = employee.id order by stat.verify desc";
$result = mysqli_query($conn, $sql);
?>


<html>
<head>
	<title>Admin Panel </title>
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
		<h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">User Information</h2>
    	<table>

			<tr >
				<th align = "center">Seq.</th>
				<th align = "center">EID</th>
				<th align = "center">Name</th>
				<th align = "center">Status</th>
				

			</tr>

			

			<?php
				$seq = 1;
				while ($employee = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>".$seq."</td>";
					echo "<td>".$employee['id']."</td>";
					
					echo "<td>".$employee['firstName']." ".$employee['lastName']."</td>";
					
					echo "<td>".$employee['verify']."</td>";
					
					$seq+=1;
				}


			?>

		</table>

		

		
	</div>
</body>
</html>