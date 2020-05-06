<?php
if (isset($_GET["verify"])){
 	
 	$verify=$_GET["verify"];

 	require "php/conn.php";

 	$sql = "SELECT username FROM players_credentials WHERE verified=FALSE";
 	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()){
		if(md5($row["username"])==$verify){
			$flag=1;
			$user=$row["username"];
			break;
		}
	}
	if(isset($flag)){
		$flag=null;
		$sql = "UPDATE players_credentials SET verified=TRUE WHERE username='$user'";
		$conn->query($sql);
		$sql = "INSERT INTO players_details(`username`,`pic`) VALUES ('$user','logo')";
		$conn->query($sql);
		$sql = "INSERT INTO players_pc_config(`username`) VALUES ('$user')";
		$conn->query($sql);	
		$sql = "INSERT INTO players_social(`username`) VALUES ('$user')";
		$conn->query($sql);			
		mkdir("pic_folder/$user");
		$status="success";
		$msg='<i class="fas fa-check-circle"></i>'." Account Succesfully Verified. <a href='login.php'><b>Login</b></a>";
		
	}
	else{
		$sql = "SELECT username FROM players_credentials WHERE verified=TRUE";
 		$result = $conn->query($sql);
		while($row = $result->fetch_assoc()){
			if(md5($row["username"])==$verify){
				$flag=1;
				break;
			}
		}
		if(isset($flag)){
		$flag=null;	
		$status="success";
		$msg='<i class="fas fa-check-circle"></i>'." Account Already Verified. <a href='login.php'><b>Login</b></a>";		
		}
		else{
			$status="danger";
			$msg='<i class="fas fa-exclamation-triangle"></i> Account Verification failed';
		}
	}

	$conn->close();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Verify</title>
	<?php require "php/head.php" ?>
</head>
<body>

	<?php require "php/nav.php" ?>

	<div class="container" style="margin-top: 100px;">
	<div class="row">
	<div class="col-10 offset-1 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4" style="margin-bottom: 100px;">
	<div class="card border-primary font-weight-bold" style="background-color: #397792d1!important;">
  		<div class="card-header bg-primary text-white" style="text-align: center;">VERIFICATION</div>
  			<div class="card-body">
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<?php if(isset($msg)) echo '<div class="alert alert-'.$status.' text-center" style="margin: 10px 0; padding: 1px;" role="alert">'.$msg.'</div>' ?>
			</form>
    				
  			</div>
	</div>
	</div>
	</div>
	</div>


	<?php require "php/footer.php" ?>

</body>
</html>
<?php 
} 
else{
	header("Location: index.php");
	die();
}
?>