<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){

	session_start();
	$user=$_SESSION["user"];

	require "conn.php";

	$link=$_POST["udel"];

	$sql="DELETE FROM players_youtube WHERE username='$user' AND video='$link'";
	$conn->query($sql);
	
	$conn->close();

}
else{
	header("Location: ../");
	die();
}

?>