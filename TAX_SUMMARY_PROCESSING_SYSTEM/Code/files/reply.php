<?php 
	$id = (isset($_GET['id']) ? $_GET['id'] : '');
	require_once ('process/dbh.php');
	$sql = "SELECT * FROM `query` where eid = '$id'";
	$result = mysqli_query($conn, $sql);
	
?>



<html> 
<head>
	<title>Employee Panel </title>
	<link rel="stylesheet" type="text/css" href="styleview.css">
</head>
<body>
	
	<header>
		<nav>
			
			<ul id="navli">
				<li><a class="homeblack" href="eloginwel.php?id=<?php echo $id?>"">HOME</a></li>
				<li><a class="homeblack" href="myprofile.php?id=<?php echo $id?>"">My Profile</a></li>
				
				<li><a class="homeblack" href="resp.php?id=<?php echo $id?>"">Message Admin</a></li>
				<li><a class="homeblack" href="elogin.html">Log Out</a></li>
			</ul>
		</nav>
	</header>
	 
	<div class="divider"></div>
	<div id="divimg">


		<table>
			<tr>

				<th align = "center">ID</th>
				<th align = "center">Reply</th>
				<th align = "center">Message Date</th>
				<th align = "center">Reply Date</th>
				
				
				<th align = "center">Option</th>
			</tr>

			<?php
				while ($employee = mysqli_fetch_assoc($result)) {

					echo "<tr>";
					echo "<td>".$employee['pid']."</td>";
					echo "<td>".$employee['pname']."</td>";
					echo "<td>".$employee['date1']."</td>";
					echo "<td>".$employee['date2']."</td>";
					
					
					

					 echo "<td><a href=\"psubmit.php?pid=$employee[pid]&id=$employee[eid]\">Seen</a>";

				}


			?>

		</table>

		</body>
</html>