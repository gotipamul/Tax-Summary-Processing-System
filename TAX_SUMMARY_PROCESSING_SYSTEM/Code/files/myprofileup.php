<?php

require_once ('process/dbh.php');
$sql = "SELECT * FROM `employee` WHERE 1";

//echo "$sql";
$result = mysqli_query($conn, $sql);
if(isset($_POST['update']))
{

  $id = mysqli_real_escape_string($conn, $_POST['id']);
  
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  
  $contact = mysqli_real_escape_string($conn, $_POST['contact']);
  $tot_tax_liability = mysqli_real_escape_string($conn, $_POST['tot_tax_liability']);
 


 $result = mysqli_query($conn, "UPDATE `employee` SET `email`='$email',`contact`='$contact',`tot_tax_liability`='$tot_tax_liability' WHERE id=$id");

 echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Updated')
    window.location.href='myprofile.php?id=$id  ';
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
  // $salary = $res['salary'];
}
}

?>

<html>
<head>
  <title>Update Profile </title>
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
        <li><a class="homered" href="eloginwel.php?id=<?php echo $id?>"">HOME</a></li>
        <li><a class="homeblack" href="myprofile.php?id=<?php echo $id?>"">My Profile</a></li>
      
        <li><a class="homeblack" href="resp.php?id=<?php echo $id?>"">Message Admin</a></li>
        <li><a class="homeblack" href="elogin.html">Log Out</a></li>
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
                    <form id = "registration" action="myprofileup.php" method="POST">



                        <div class="input-group">
                          <p>Email</p>
                            <input class="input--style-1" type="text"  name="email" value="<?php echo $email;?>">
                        </div>
                       
                        
                        
                       

                        
                         <div class="input-group">
                          <p>Address</p>
                            <input class="input--style-1" type="text"  name="tot_tax_liability" value="<?php echo $tot_tax_liability;?>">
                        </div>

                       
                        <input type="hidden" name="id" id="textField" value="<?php echo $id;?>" required="required"><br><br>
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit" name="update">Submit</button>
                        </div>
                        
                    </form>
                    <br>
                    <button class="btn btn--radius btn--green" onclick="window.location.href = 'changepassemp.php?id=<?php echo $id?>';">Change Password</button>
                </div>
            </div>
        </div>
    </div>


</body>
</html>
