<?php

require_once ('process/dbh.php');
$sql = "SELECT * FROM `employee` WHERE 1";

//echo "$sql";
$result = mysqli_query($conn, $sql);
if(isset($_POST['update']))
{

	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$firstname = mysqli_real_escape_string($conn, $_POST['firstName']);
	$lastname = mysqli_real_escape_string($conn, $_POST['lastName']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$birthday = mysqli_real_escape_string($conn, $_POST['birthday']);
	$contact = mysqli_real_escape_string($conn, $_POST['contact']);
	$tot_tax_liability = mysqli_real_escape_string($conn, $_POST['tot_tax_liability']);
	$gender = mysqli_real_escape_string($conn, $_POST['gender']);
	$nid = mysqli_real_escape_string($conn, $_POST['nid']);
	$tax = mysqli_real_escape_string($conn, $_POST['tax']);
	$income_tax = mysqli_real_escape_string($conn, $_POST['income_tax']);
	//$salary = mysqli_real_escape_string($conn, $_POST['salary']);





	

$result = mysqli_query($conn, "UPDATE `employee` SET `firstName`='$firstname',`lastName`='$lastname',`email`='$email',`birthday`='$birthday',`gender`='$gender',`contact`='$contact',`nid`='$nid',`tot_tax_liability`='$tot_tax_liability',`tax`='$tax',`income_tax`='$income_tax' WHERE id=$id");
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Updated')
    window.location.href='viewemp.php';
    </SCRIPT>");


	
}
?>




<?php
	$id = (isset($_GET['id']) ? $_GET['id'] : '');
	$sql = "SELECT * from `employee` WHERE id=$id";
	$result = mysqli_query($conn, $sql);
	if($result){
	while($res = mysqli_fetch_assoc($result)){
	$firstname = $res['firstName'];
	$lastname = $res['lastName'];
	$email = $res['email'];
	$contact = $res['contact'];
	$tot_tax_liability = $res['tot_tax_liability'];
	$gender = $res['gender'];
	$birthday = $res['birthday'];
	$nid = $res['nid'];
	$tax = $res['tax'];
	$income_tax = $res['income_tax'];
	
}
}

?>

<html>
<head>
	<title>View User </title>
	<!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
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
	

		<!-- <form id = "registration" action="edit.php" method="POST"> -->
	<div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Update User Info</h2>
                    <form id = "registration" action="edit.php" method="POST">

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                     <input class="input--style-1" type="text" name="firstName" value="<?php echo $firstname;?>" >
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" name="lastName" value="<?php echo $lastname;?>">
                                </div>
                            </div>
                        </div>





                        <div class="input-group">
                            <input class="input--style-1" type="email"  name="email" value="<?php echo $email;?>">
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" name="birthday" value="<?php echo $birthday;?>">
                                   
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
									<input class="input--style-1" type="text" name="gender" value="<?php echo $gender;?>">
                                </div>
                            </div>
                        </div>
                        
                        <div class="input-group">
                            <input class="input--style-1" type="text" name="contact" value="<?php echo $contact;?>">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="text" name="nid" value="<?php echo $nid;?>">
                        </div>

                        
                         <div class="input-group">
                            <input class="input--style-1" type="text"  name="tot_tax_liability" value="<?php echo $tot_tax_liability;?>">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="text" name="tax" value="<?php echo $tax;?>">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="text" name="income_tax" value="<?php echo $income_tax;?>">
                        </div>
                        <input type="hidden" name="id" id="textField" value="<?php echo $id;?>" required="required"><br><br>
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit" name="update">Submit</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>


     <!-- Jquery JS-->
    <!-- <script src="vendor/jquery/jquery.min.js"></script>
   
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

   
    <script src="js/global.js"></script> -->
</body>
</html>
