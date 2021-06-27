<?php
include 'app/connect.php';
if(isset($_POST['submit'])){

	$USN = $_POST['USN'];
	$Name = $_POST['Name'];

	$sql = "UPDATE student SET NAME = ? WHERE USN = ?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("ss",$Name,$USN);
	$result=$stmt->execute();

	if($result){
		?> <script> alert("Record was Successfully Updated in the Database."); </script>
	<?php
	}else{ ?>
		<script> alert("The Update Operation was Unsuccessful"); </script>
	<?php
	}

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

<form method="post" action="update.php">
	<fieldset>
	<label for="USN"> USN </label> 
	<input type="text" name="USN" placeholder="Enter Student USN" required ">

	<label for="Name"> NAME </label> 
	<input type="text" name="Name" placeholder="Enter Student Name" required ">

	<button type="submit" name="submit">SUBMIT</button>
	</fieldset>
</form>
</body>
</html>