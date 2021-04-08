<!DOCTYPE html>
<html>

<head>
   

    <!-- Title Page-->
    <title>Admin Panel</title>

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




    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                
                <div class="card-body">
                    <h2 class="title">Answer query</h2>
                    <form action="process/assignp.php" method="POST" enctype="multipart/form-data">


                        

                         <div class="input-group">
                            <input class="input--style-1" type="number" placeholder="id" name="eid" required="required">
                        </div>





                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Reply" name="ans_query" required="required">
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="date" placeholder="date" name="Date" required="required">
                                   
                                </div>
                            </div>
                            
                        </div>
                        
                        



                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit">Send</button>
                        </div> </form>
<div align="right"><a href="assignproject.php" align="right"><button class="btn btn--radius btn--green" >Query History</button></a></div>
                        
                        </div>                   



                </div>
            </div>
        </div>
    </div>

                           
                           


    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body>

</html>
<!-- end document-->
