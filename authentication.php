<?php
$message="";
if(count($_POST)>0) {
	$conn = mysqli_connect("localhost","root","","users");
	$result = mysqli_query($conn,"SELECT * FROM users WHERE username='" . $_POST["user"] . "' and password = '". $_POST["pass"]."'");
	$count  = mysqli_num_rows($result);
	if($count==0) {
		$message = "Invalid Username or Password!";
	} else {
		$message = "You are successfully authenticated!";
		header("Location: welcome.php?error=Incorect User name or password");
	}
}
?>
