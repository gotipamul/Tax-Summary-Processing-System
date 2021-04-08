

<?php include('server.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>REGISTRATION</title>
	<link rel="stylesheet" type="text/css" href="signup.css">
</head>
<body>
	<div class="header">
		<h2>OPEN CHAT BOX</h2>
	</div>

	<form method="post" action="register.php">
		<!--errors display-->
		<?php include('errors.php');?>

		<div class="input-group">
			<label>Enter valid email</label>
			<input type="email" name="username" value="<?php echo $username;?>">
		</div>
		
		
		<div class="input-group">
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<button type="submit" name="register" class="btn" align="center">OPEN CHAT WINDOW</button>
			<br>
			<br>
			<br>
			<br>
			<br>
			
			

		</div>
		<a href="index.html">GO TO HOME PAGE</a>
		
	</form>
</body>
</html>