<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){

	session_start();
	$user=$_SESSION["user"];

	require "conn.php";

	$cpu=$conn->real_escape_string($_POST["cpu"]);
	$mobo=$conn->real_escape_string($_POST["mobo"]);
	$gpu=$conn->real_escape_string($_POST["gpu"]);
	$ram=$conn->real_escape_string($_POST["ram"]);
	$smps=$conn->real_escape_string($_POST["smps"]);
	$hdd=$conn->real_escape_string($_POST["hdd"]);
	$monitor=$conn->real_escape_string($_POST["monitor"]);
	$keyboard=$conn->real_escape_string($_POST["keyboard"]);
	$mouse=$conn->real_escape_string($_POST["mouse"]);
	$headphone=$conn->real_escape_string($_POST["headphone"]);

	

	$sql = "UPDATE players_pc_config SET cpu='$cpu', mobo='$mobo', gpu='$gpu', ram='$ram', smps='$smps', hdd='$hdd', monitor='$monitor', keyboard='$keyboard', mouse='$mouse', headphone='$headphone' WHERE username='$user'";
	$conn->query($sql);

	$conn->close();

}
else{
	header("Location: ../");
	die();
}

?>