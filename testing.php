<?php

include("connection.php");
$email = $_POST['email'];
$password = $_POST['password'];
if(isset($_POST['submitlogin'])) {

	$query = "select * from `learners` where email = '$email' and password = '$password'";
	$result = mysql_query($query);

	if(!$result) {

		echo "The query failed " . mysql_error();

		echo "<a href=\"login.php\">Login Fail! Try again!</a>";

	}

	else {
		$row = mysql_fetch_array($result);
		echo "<a href=\"cube.php\"></a>";

	}
}
?>