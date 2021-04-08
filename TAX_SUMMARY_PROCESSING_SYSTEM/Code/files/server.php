

<?php
session_start();
$host="localhost";
$dbusername="root";
$dbpassword="";
$db="chat";

$username="";
$password1="";
$email="";
$errors=array();

$con=mysqli_connect($host,$dbusername,$dbpassword,$db);

//signupfor

if(isset($_POST["register"]))
{
	$username=mysqli_real_escape_string($con,$_POST['username']);
	

	if(empty($username))
	{
		array_push($errors, "username is required");
	}


	
	if(count($errors)==0)
	{
		//$password=mds($password1); //encrypt password
		$sql="INSERT INTO login (username) VALUES ('$username')";
		mysqli_query($con,$sql);
		$_SESSION['username']=$username;
		
		header("location: home1.php");
	}
}

// log user in from login page
if(isset($_POST['login']))
{
	$username=mysqli_real_escape_string($con,$_POST['username']);
	
	if(empty($username))
	{
		array_push($errors, "username is required");
	}

	
	if(count($errors)==0)
	{
		$query="SELECT * FROM login WHERE username='$username' '";
		$result=mysqli_query($con,$query);
		if(mysqli_num_rows($result)==1)
		{
			$_SESSION['username']=$username;
			
			header("location: home1.php");
		}
		
	}

}
//logout

if(isset($_GET['logout']))
{
	session_destroy();
	unset($_SESSION['username']);
	header('location: login.php');
}
?>