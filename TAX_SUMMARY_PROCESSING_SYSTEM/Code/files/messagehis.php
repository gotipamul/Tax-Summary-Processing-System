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
<div class="divider"></div>

		<table>
			<tr>

				<th align = "center">Seq.(Unique id)</th>
				<th align = "center">eid</th>
				<th align = "center">Comment</th>
				<th align = "center">Answered Date</th>
				<th align = "center">Asked Date</th>
				<th align = "center">Mark</th>
				<th align = "center">Query Status</th>
				<th align = "center">Option</th>
				
			</tr>

			<?php
				while ($employee = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>".$employee['pid']."</td>";
					echo "<td>".$employee['eid']."</td>";
					echo "<td>".$employee['ans_query']."</td>";
					echo "<td>".$employee['date1']."</td>";
					echo "<td>".$employee['date2']."</td>";
					echo "<td>".$employee['mark']."</td>";
					echo "<td>".$employee['status']."</td>";
					echo "<td><a href=\"mark.php?id=$employee[eid]&pid=$employee[pid]\">Mark</a>"; 

				}


			?>

		</table>
		
	
</body>
</html>