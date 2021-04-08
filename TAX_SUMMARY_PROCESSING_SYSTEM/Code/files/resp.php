<?php 
	$id = (isset($_GET['id']) ? $_GET['id'] : '');
	require_once ('process/dbh.php');
	$sql = "SELECT * FROM `employee` where id = '$id'";
	$result = mysqli_query($conn, $sql);
	$employee = mysqli_fetch_array($result);
	$empName = ($employee['firstName']);
	//echo "$id";
?>

<html>
<head>
	<title>Apply Leave | Employee Panel</title>
	<link rel="stylesheet" type="text/css" href="styleapply.css">
</head>
<body bgcolor="#F0FFFF"> 
	
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
	<div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Message Admin</h2>
                    <form action="process/applyprocess.php?id=<?php echo $id?>" method="POST">


                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Query" name="msg1">
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                            	<p>registration Date</p>
                                <div class="input-group">
                                    <input class="input--style-1" type="date" placeholder="start" name="start">
                                   
                                </div>
                            </div>
                            <div class="col-2">
                            	<p>messaging Date</p>
                                <div class="input-group">
                                    <input class="input--style-1" type="date" placeholder="end" name="end">
                                   
                                </div>
                            </div>
                        </div>
                        



                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
		
















	<table>
			<tr>
				<th align = "center">Emp. ID</th>
				<th align = "center">Name</th>
				<th align = "center">Start Date</th>
				<th align = "center">End Date</th>
				<th align = "center">Total Days</th>
				<th align = "center">Reason</th>
				<th align = "center">Status</th>
			</tr>


			<?php


				$sql = "Select employee.id, employee.firstName, employee.lastName, message.start, message.end, message.msg1, message.status From employee, message Where employee.id = $id and message.id = $id order by message.token";
				$result = mysqli_query($conn, $sql);
				while ($employee = mysqli_fetch_assoc($result)) {
					$date1 = new DateTime($employee['start']);
					$date2 = new DateTime($employee['end']);
					$interval = $date1->diff($date2);
					$interval = $date1->diff($date2);

					echo "<tr>";
					echo "<td>".$employee['id']."</td>";
					echo "<td>".$employee['firstName']." ".$employee['lastName']."</td>";
					
					echo "<td>".$employee['start']."</td>";
					echo "<td>".$employee['end']."</td>";
					echo "<td>".$interval->days."</td>";
					echo "<td>".$employee['msg1']."</td>";
					echo "<td>".$employee['status']."</td>";
					
				}


			?>


		</table>







</body>
</html>