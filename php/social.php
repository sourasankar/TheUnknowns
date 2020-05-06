<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){

	session_start();
	$user=$_SESSION["user"];

	require "conn.php";

	$steam=$conn->real_escape_string($_POST["steam"]);
	$uplay=$conn->real_escape_string($_POST["uplay"]);
	$youtube=$conn->real_escape_string($_POST["youtube"]);
	$facebook=$conn->real_escape_string($_POST["facebook"]);
	$instagram=$conn->real_escape_string($_POST["instagram"]);
	$twitter=$conn->real_escape_string($_POST["twitter"]);


	$sql = "UPDATE players_social SET steam='$steam', uplay='$uplay', youtube='$youtube', facebook='$facebook', instagram='$instagram', twitter='$twitter'  WHERE username='$user'";
	$conn->query($sql);

	$conn->close();

}
else{
	header("Location: ../");
	die();
}

?>