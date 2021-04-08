<?php

require_once ('dbh.php');

$ans_query = $_POST['ans_query'];
$eid = $_POST['eid'];
$date1 = $_POST['date2'];

$sql = "INSERT INTO `query`(`eid`, `ans_query`, `date1` , `status`) VALUES ('$eid' , '$ans_query' , '$date2' , 'Due')";

$result = mysqli_query($conn, $sql);


if(($result) == 1){
    
    
    header("Location: ..//assignproject.php");
}

else{
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Failed to Assign')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
}




?>