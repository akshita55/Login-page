<?php
include 'connect.php';
session_start();

if(isset($_POST['submit'])){
	$USN = $_POST['USN'];
	$Password = $_POST['Password'];

	$sql = "SELECT USN,NAME,PASSWORD FROM student WHERE USN=?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("s",$USN);
	$stmt->execute();

	$stmt->bind_result($db_usn,$db_name,$db_pass);
	if($stmt->fetch()){
		//echo $db_usn;
		//echo $db_pass;
		$_SESSION['Name'] = $db_name;
		//echo $_SESSION['Name'];
		$pass_decode = password_verify($Password, $db_pass);

		if($pass_decode){
			echo "Login successful";
			header("location:index.php");
		}else{
			echo "Incorrect Password";
		}
	}else{
		echo "Incorrect USN";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
<title></title>
	<link rel="stylesheet" href="assets/login.css">

</head>
<body>

<form method="post" action="login.php">
		<fieldset>
			<legend id="reg">LOGIN</legend>
			<br>
			<label for="USN"> USN </label> 
				<input type="text" name="USN" placeholder="Enter UserID" required >

			<br>
			<label for="Password"> PASSWORD </label> 	
			<input type="password" name="Password" placeholder="Enter Password" >
			
			
			<button type="submit" name="submit"><b> SUBMIT </b> </button>
			<br>
			<a href="registration.php"> Don't Have an Account? </a>
			</fieldset>
	</form>
</body>
</html>
