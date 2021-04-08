<?php include 'db1.php'; ?>
<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Chat Box</title>
	<link rel="stylesheet" href="style1.css" media="all">
	<script type="text/javascript">
		function ajax() {

			var req = new XMLHttpRequest();

			req.onreadystatechange = function() {
				if(req.readyState == 4 && req.status == 200) {
					document.getElementById('chat').innerHTML = req.responseText;
				}
			}

			req.open('GET', 'chat.php', true);
			req.send();

		}
		setInterval(function() {ajax()}, 1000);
	</script>
</head>
<body onload="ajax();">

<div id="container">
	<div id="chat_box">
		<div id="chat"></div>
	</div>
	<form method="post" action="home1.php">
		<textarea name="msg" placeholder="enter message" maxlength="150"></textarea>
		<input type="submit" name="submit" value="Send it">
		
	</form>

	<?php 
	if(isset($_POST['submit'])) {
		$msg = $_POST['msg'];
		$name=$_SESSION['username'];
		$query = "INSERT INTO chat (name,msg) VALUES ('$name','$msg') "; 

		$run = $con->query($query);

		if($run) {
			echo "<embed loop='false' src='chat.wav' hidden='true' autoplay='true'/>";
		}

	}
	?>
	<a href="index.html">GO TO HOME PAGE</a>
</div>



</body>
</html>