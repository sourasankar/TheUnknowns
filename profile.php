<?php
session_start();

if (isset($_GET["profile"])){

	$profile=$_GET["profile"];

	require "php/conn.php";

	$sql = "SELECT firstname,lastname FROM players_credentials WHERE username='$profile'";
	$result = $conn->query($sql);
	if ($result->num_rows==0){
		header("Location: index.php");
		die();
	}
	$row = $result->fetch_assoc();
	$fname=$row["firstname"];
	$lname=$row["lastname"];


	$sql = "SELECT ign,color,pic,pic_cache FROM players_details WHERE username='$profile'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$ign=$row["ign"];
	$color=$row["color"];
	$pic=$row["pic"];
	$pic_cache=$row["pic_cache"];


	$sql="SELECT cpu,mobo,gpu,ram,smps,hdd,monitor,keyboard,mouse,headphone FROM players_pc_config WHERE username='$profile'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$cpu=$row["cpu"];
	$mobo=$row["mobo"];
	$gpu=$row["gpu"];
	$ram=$row["ram"];
	$smps=$row["smps"];
	$hdd=$row["hdd"];
	$monitor=$row["monitor"];
	$keyboard=$row["keyboard"];
	$mouse=$row["mouse"];
	$headphone=$row["headphone"];
	if ($cpu==null && $mobo==null && $gpu==null && $ram==null && $smps==null && $hdd==null && $monitor==null && $keyboard==null && $mouse==null && $headphone==null) {
		$pcconfig=1;
	}


	$sql="SELECT steam,uplay,youtube,facebook,instagram,twitter FROM players_social WHERE username='$profile'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();

	$steam=$row["steam"];
	$uplay=$row["uplay"];
	$youtube=$row["youtube"];
	$facebook=$row["facebook"];
	$instagram=$row["instagram"];
	$twitter=$row["twitter"];


	$sql="SELECT video FROM players_youtube WHERE username='$profile'";
	$result = $conn->query($sql);
	$i=0;
	$videos=null;
	while ($row = $result->fetch_assoc()) {
		$videos[$i]=$row["video"];
		$i++;
	}



	$conn->close();


?>






<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php require "php/head.php" ?>	
</head>
<body>

	<?php require "php/nav.php" ?>


	<div class="container" style="margin-top:100px;margin-bottom: 80px;">
	<div class="row">
	<div class="col-12 col-md-10 offset-md-1">
	<div class="card border-primary font-weight-bold" style="background-color: #397792d1!important;">
  		<div class="card-header text-white text-center">  

  			<img class="profilelogo" src="<?php echo "profile_pic/"."$pic".".jpg?"."$pic_cache" ?>" style="margin-bottom: 10px;"><br>
  			<div class="profileign"><?php echo $ign ?></div>
  			<div class="profilehead"><?php echo strtoupper($fname).' '.strtoupper($lname) ?></div>
  			<div style="margin-top: 10px">
  				<?php if($steam!=""){ ?>
  				<a href="<?php echo $steam ?>" target="_blank"><img src="logo/steam.png" width="50px"></a>
  				<?php } if($uplay!=""){ ?>
  				<a tabindex="0" data-toggle="popover" data-trigger="focus" title="Search for" data-content="<?php echo $uplay ?>"><img src="logo/uplay.jpg" width="50px" style="border-radius: 50%; cursor: pointer;"></a>
  				<?php } if($youtube!=""){ ?>
  				<a href="<?php echo $youtube ?>" target="_blank"><img src="logo/yt.png" width="50px"></a>
  				<?php } if($facebook!=""){ ?>
  				<a href="<?php echo $facebook ?>" target="_blank"><img src="logo/fb.png" width="50px"></a>
  				<?php } if($instagram!=""){ ?>
  				<a href="https://www.instagram.com/<?php echo $instagram ?>" target="_blank"><img src="logo/insta.png" width="50px"></a>
  				<?php } if($twitter!=""){ ?>
  				<a href="https://twitter.com/<?php echo $twitter ?>" target="_blank"><img src="logo/twit.png" width="50px"></a>
  				<?php } ?>
  			</div>


  		</div>
  			<div class="card-body">
  				<?php if(!isset($pcconfig)){ ?>
				<div style="background-color: #17a2b89c!important;width: fit-content;padding: 10px;border: 1px solid #dee2e6;color: #212529; margin-bottom: 5px;"><i class="fas fa-desktop"></i> PC Configuration</div>
				<table class="table table-hover bg-info">
					  <tbody>
					  	<?php if($cpu!=""){  ?>
					    <tr>					    	
					      <td><i class="fas fa-microchip"></i> CPU</td>
					      <td><?php echo $cpu ?></td>
					    </tr>
						<?php } if($mobo!=""){ ?>
					    <tr>
					      <td><i class="fas fa-server"></i> Motherboard</td>
					      <td><?php echo $mobo ?></td>
					    </tr>
						<?php } if($gpu!=""){ ?>
					    <tr>
					      <td><i class="fas fa-microchip"></i> GPU</td>
					      <td><?php echo $gpu ?></td>
					    </tr>
						<?php } if($ram!=""){ ?>
					    <tr>
					      <td><i class="fas fa-memory"></i> RAM</td>
					      <td><?php echo $ram ?></td>
					    </tr>
						<?php } if($smps!=""){ ?>
					    <tr>
					      <td><i class="fas fa-plug"></i> SMPS</td>
					      <td><?php echo $smps ?></td>
					    </tr>
					    <?php } if($hdd!=""){ ?>
					    <tr>
					      <td><i class="fas fa-hdd"></i> HDD/SSD</td>
					      <td><?php echo $hdd ?></td>
					    </tr>
						<?php } if($monitor!=""){ ?>
					    <tr>
					      <td><i class="fas fa-tv"></i> Monitor</td>
					      <td><?php echo $monitor ?></td>
					    </tr>
						<?php } if($keyboard!=""){ ?>
					    <tr>
					      <td><i class="fas fa-keyboard"></i> Keyboard</td>
					      <td><?php echo $keyboard ?></td>
					    </tr>
						<?php } if($mouse!=""){ ?>
					    <tr>
					      <td><i class="fas fa-mouse"></i> Mouse</td>
					      <td><?php echo $mouse ?></td>
					    </tr>
						<?php } if($headphone!=""){ ?>
					    <tr>
					      <td><i class="fas fa-headphones"></i> Headphone</td>
					      <td><?php echo $headphone ?></td>
					    </tr>
						<?php } ?>
					  </tbody>
				</table>
					<?php } ?>
					<?php  if (isset($videos)) { ?>
				<div style="background-color: #17a2b89c!important;width: fit-content;padding: 10px;border: 1px solid #dee2e6;color: #212529; margin-bottom: 5px;"><i class="fab fa-youtube"></i> Featured Youtube Videos</div>
				<div class="row" style="background-color: #17a2b89c!important;padding-top: 20px;margin: auto;">
					<?php 
			  			$arrlength=count($videos);
			  			for ($x=0;$x<$arrlength;$x++) { 	  								
			  		?>
					<div class="col-12 col-md-6">				  
						<div class="embed-responsive embed-responsive-16by9" style="margin-bottom: 20px;">
			  				<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $videos[$x]; ?>" allowfullscreen></iframe>
						</div>															
					</div>
					<?php } } ?>
				</div>
			</div>
    				
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