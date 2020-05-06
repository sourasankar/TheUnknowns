<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){

	session_start();
	$user=$_SESSION["user"];

	require "conn.php";

	$link=$conn->real_escape_string($_POST["ytlink"]);

	$sql="SELECT video FROM players_youtube WHERE username='$user'";
	$conn->query($sql);
	$result = $conn->query($sql);
	while ($row = $result->fetch_assoc()) {
		if($link==$row["video"]){
			$flag=1;
		}
	}	

	if($flag!=1){
		$sql = "INSERT INTO players_youtube (`username`, `video`) VALUES ('$user','$link')";
		$conn->query($sql);
	}

	$conn->close();

}
else{
	header("Location: ../");
	die();
}

?>