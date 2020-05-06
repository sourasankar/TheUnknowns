<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){

	session_start();
	$user=$_SESSION["user"];

	require "conn.php";
	

	$ign=$conn->real_escape_string($_POST["ign"]);
	$color=$_POST["color"];

	$sql = "UPDATE players_details SET ign='$ign',color='$color' WHERE username='$user'";
	$conn->query($sql);

	$conn->close();

}
else{
	header("Location: ../");
	die();
}

?>