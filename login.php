<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$uname=strtolower($_POST["uname"]);
	$pass=md5($_POST["pass"]);
	//connection to db

	require "php/conn.php";

	//check for username already taken

	$sql = "SELECT username FROM players_credentials WHERE verified=TRUE";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()){
		if($row["username"]==$uname){
			$flag=1;
			break;
		}
	}


	if(isset($flag)){
		$flag=null;
		$sql = "SELECT pass FROM players_credentials WHERE username='$uname'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		if ($row["pass"]==$pass) {
			//$status="success";
			//$msg="Successfully Logged In";
			session_start();
			$_SESSION["user"]=$uname;
			header("Location: logged.php");
			die();
		}
		else{
			$status="danger";
			$msg='<i class="fas fa-exclamation-triangle"></i> Password Not Matched';
		}
	}
	else{
		$status="danger";
		$msg='<i class="fas fa-exclamation-triangle"></i> User Name Not Found or Account Not Verified';
	}

	//connection to db close
	$conn->close();
}
else{
	$uname=$pass=$msg=$flag=null;	
}
	

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<?php require "php/head.php" ?>
</head>
<body>

	<?php require "php/nav.php" ?>

	<div class="container" style="margin-top:100px">
	<div class="row">
	<div class="col-10 offset-1 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4" style="margin-bottom: 100px;">
	<div class="card border-primary font-weight-bold" style="background-color: #397792d1!important;">
  		<div class="card-header bg-primary text-white" style="text-align: center;">LOGIN</div>
  			<div class="card-body">
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<div class="form-group">
						<label>User Name</label>
						<input type="text" class="form-control" placeholder="User Name" value="<?php echo $uname ?>" name="uname" required>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" onkeypress="return enter()" class="form-control" pattern=".{4,15}" title="Password should be 4-15 length" placeholder="Password" name="pass" required>
					</div>
					<button type="submit" id="bsubmit" hidden></button>
					<button type="button" id="login" onclick="myLogin()" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Login</button>
					<?php if(isset($msg)) echo '<div class="alert alert-'.$status.' text-center" style="margin: 10px 0; padding: 1px;" role="alert">'.$msg.'</div>' ?>
				</form>
    				
  			</div>
	</div>
	</div>
	</div>
	</div>


	<?php require "php/footer.php" ?>
	

	
	<script>
		function myLogin(){			
			var b=document.getElementById("login");
			var s=document.getElementById("bsubmit");
			b.innerHTML='<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Logging...';
			setTimeout(function(){s.click(); b.innerHTML='<i class="fas fa-sign-in-alt"></i> Login';},1000);		
		}    	
   		function enter() {
  			if(window.event && window.event.keyCode == 13){
  				myLogin();
				return false;	
			}	
		}
		if ( window.history.replaceState ) {
        		window.history.replaceState( null, null, window.location.href );
   		}	
	</script>

</body>
</html>