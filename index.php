<?php
session_start();
if(!isset($_SESSION['Name'])){
	header("location:login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="assets/login.css">
	<link rel="stylesheet" href="assets/index.css">
</head>
<body>

<div class="nav">
	<ul>
		<li><a href="" >HOME </a></li>
		<li><a href="" >ABOUT US </a></li>
		<li><a href="" >CONTACT US</a></li>
		<li><a href="logout.php" >LOG OUT </a></li>
	</ul>
</div>
	<h2> WELCOME! </h2>
	<h2> <?php 
			echo $_SESSION['Name'];
		?>
	</h2>

</body>
</html>