<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>The Unknowns</title>
	<?php require "php/head.php" ?>	
	<meta name="keywords" content="the unknowns,theunknowns,theunknown,the unknown,kootty420">
	<meta name="description" content="Th€ Unknown$ || Its our gaming group || We will become known to the society very soon. Because after the previous match they came to know what we are actually">
	<meta name="author" content="kootty420">
</head>


<body>
	
	<?php require "php/nav.php" ?>

	<div class="container">
		<div class="welcome">PLAYERS</div>
		
	</div>

	<div class="container" style="margin-top: 50px; margin-bottom: 60px;">
		<div class="row">
			<?php require 'php/fetch.php';
			while($row = $result->fetch_assoc()) { ?>
       
			<div class="col-8 col-sm-6 col-md-6 col-lg-4 offset-2 offset-sm-0  offset-md-0 ">
				<a href="profile.php?profile=<?php echo $row["username"] ?>" style="text-decoration: none;" >
				<div class="box">
					<img class="boxlogo" src="<?php echo "profile_pic/".$row["pic"].".jpg?".$row["pic_cache"] ?>" >
					<div class="text" style=<?php echo "background:".$row["color"] ?>><?php echo $row["ign"] ?></div>
				</div>
				</a>
			</div>
			<?php
				} 
			$conn->close(); ?>
		</div>
	</div>

	<?php require "php/footer.php" ?>

	


    
</body>
</html>