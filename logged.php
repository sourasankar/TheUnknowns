<?php 
session_start(); 
if (!isset($_SESSION["user"])) {
	header("Location: login.php");
	die();
}

$user=$_SESSION["user"];

require "php/conn.php";


	$purple=$blue=$green=$yellow=$orange=$defaultcol=null;
	$sql = "SELECT ign,color,pic,pic_cache FROM players_details WHERE username='$user'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$ign=$row["ign"];
	$color=$row["color"];
	$pic=$row["pic"];
	$pic_cache=$row["pic_cache"];
	switch ($color) {
		case '#803ca1':
			$purple="checked";
			break;
		case '#eda338':
			$orange="checked";
			break;
		case '#109856':
			$green="checked";
			break;
		case '#68a3e5':
			$blue="checked";
			break;
		case '#f1d800':
			$yellow="checked";
			break;		
		default:
			$defaultcol="checked";
			break;
	}

	$sql="SELECT cpu,mobo,gpu,ram,smps,hdd,monitor,keyboard,mouse,headphone FROM players_pc_config WHERE username='$user'";
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

	$sql="SELECT steam,uplay,youtube,facebook,instagram,twitter FROM players_social WHERE username='$user'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();

	$steam=$row["steam"];
	$uplay=$row["uplay"];
	$youtube=$row["youtube"];
	$facebook=$row["facebook"];
	$instagram=$row["instagram"];
	$twitter=$row["twitter"];

	$sql="SELECT video FROM players_youtube WHERE username='$user'";
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
	<title><?php echo $_SESSION["user"] ?></title>
	<?php require "php/head.php" ?>
</head>
<body>

	<?php require "php/nav.php" ?>
	
	<div class="container" style="margin-top:100px;margin-bottom: 80px">

		<div class="row">


			<div class="col-10 offset-1 col-sm-8 offset-sm-2 col-md-6 offset-md-0 col-lg-5 offset-lg-1 col-xl-4 offset-xl-2" style="margin-bottom: 40px;">
				<div class="card border-primary font-weight-bold" style="background-color: #397792d1!important;">
			  		<div class="card-header bg-primary text-white" style="text-align: center;"><i class="fas fa-user-circle"></i> Profile Picture</div>
			  		<div class="card-body">
						<div style="text-align: center;">
							<div class="form-group">
								<img class="logo2" src="profile_pic/<?php echo $pic.".jpg?".$pic_cache; ?>" style="width: 40%;" >
							</div>
						</div>				
						<form action="php/upload.php" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label><i class="fas fa-user-circle"></i> Profile Picture</label>
								<input type="file" accept=".jpg,.png,.jpeg" name="fileToUpload" id="fileToUpload" required>
							</div>
							<div class="alert alert-danger text-center" style="margin: 10px 0; padding: 1px;" role="alert"><i class="fas fa-exclamation-circle"></i> Upload only 1:1 (square) Cropped Image for Better Result</div>
							<div class="form-group">
								<button type="submit" id="ubsubmit" hidden></button>
								<button type="button" id="upload" onclick="myUpload()" class="btn btn-primary"><i class="fas fa-upload"></i> Upload Image</button>
							</div>    			
						</form>    				
			  		</div>
				</div>
			</div>
		

			<div class="col-10 offset-1 col-sm-8 offset-sm-2 col-md-6 offset-md-0 col-lg-5 offset-lg-0 col-xl-4 offset-xl-0" style="margin-bottom: 40px;">
				<div class="card border-primary font-weight-bold" style="background-color: #397792d1!important;">
			  		<div class="card-header bg-primary text-white" style="text-align: center;"><i class="fas fa-info-circle"></i> Set Details</div>
			  		<div class="card-body">
						<form method="post" action="php/setdetails.php" target="dummy">
						<div class="form-group">
							<label><i class="fas fa-address-card"></i> In Game Name</label>
							<input type="text" value="<?php echo $ign ?>" class="form-control" placeholder="In Game Name"  name="ign" required>
						</div>
						<div class="form-group">
						<label><i class="fas fa-palette"></i> COLOR</label>
						<div class="custom-control custom-radio">
			  				<input type="radio" id="radiobutton1" name="color" class="custom-control-input" value="" <?php echo $defaultcol; ?>>
			  				<label class="custom-control-label" for="radiobutton1">No Color</label>
						</div>
						<div class="custom-control custom-radio">
			  				<input type="radio" id="radiobutton2" name="color" class="custom-control-input" value="#803ca1" <?php echo $purple; ?>>
			  				<label class="custom-control-label" for="radiobutton2">Purple</label>
						</div>
						<div class="custom-control custom-radio">
			  				<input type="radio" id="radiobutton3" name="color" class="custom-control-input" value="#eda338" <?php echo $orange; ?>>
			  				<label class="custom-control-label" for="radiobutton3">Orange</label>
						</div>
						<div class="custom-control custom-radio">
			  				<input type="radio" id="radiobutton4" name="color" class="custom-control-input" value="#109856" <?php echo $green; ?>>
			  				<label class="custom-control-label" for="radiobutton4">Green</label>
						</div>
						<div class="custom-control custom-radio">
			  				<input type="radio" id="radiobutton5" name="color" class="custom-control-input" value="#68a3e5" <?php echo $blue; ?>>
			  				<label class="custom-control-label" for="radiobutton5">Blue</label>
						</div>
						<div class="custom-control custom-radio">
			  				<input type="radio" id="radiobutton6" name="color" class="custom-control-input" value="#f1d800" <?php echo $yellow; ?>>
			  				<label class="custom-control-label" for="radiobutton6">Yellow</label>
						</div>
						</div>
						<div class="form-group">
							<button type="submit" id="dbsubmit" hidden></button>
							<button type="button" id="setdetails" onclick="myDetails()" class="btn btn-primary"><i class="fas fa-user-edit"></i> Update</button>
						</div>
						<div id="setdetailsalert" class="alert alert-success text-center" style="margin: 10px 0; padding: 1px;" role="alert" hidden><i class="fas fa-check-circle"></i> Updated Successfully
						</div>
						</form>	    				
			  		</div>
				</div>
			</div>

			<div class="col-10 offset-1 col-sm-8 offset-sm-2 col-md-12 offset-md-0 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2" style="margin-bottom: 40px;">
				<div class="card border-primary font-weight-bold" style="background-color: #397792d1!important;">
	  				<div class="card-header bg-primary text-white" style="text-align: center;"><i class="fas fa-desktop"></i> PC Configuration</div>
	  				<div class="card-body">
						<form method="post" action="php/pcconfig.php" target="dummy">
							<div class="row">
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label><i class="fas fa-microchip"></i> CPU</label>
										<input type="text" value="<?php echo $cpu ?>" class="form-control" placeholder="CPU"  name="cpu">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
											<label><i class="fas fa-server"></i> Motherboard</label>
											<input type="text" value="<?php echo $mobo ?>" class="form-control" placeholder="Motherboard"  name="mobo">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
											<label><i class="fas fa-microchip"></i> GPU</label>
											<input type="text" value="<?php echo $gpu ?>" class="form-control" placeholder="GPU"  name="gpu">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
											<label><i class="fas fa-memory"></i> RAM</label>
											<input type="text" value="<?php echo $ram ?>" class="form-control" placeholder="RAM"  name="ram">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
											<label><i class="fas fa-plug"></i> SMPS</label>
											<input type="text" value="<?php echo $smps ?>" class="form-control" placeholder="SMPS"  name="smps">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
											<label><i class="fas fa-hdd"></i> HDD/SSD</label>
											<input type="text" value="<?php echo $hdd ?>" class="form-control" placeholder="HDD/SSD"  name="hdd">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
											<label><i class="fas fa-tv"></i> Monitor</label>
											<input type="text" value="<?php echo $monitor ?>" class="form-control" placeholder="Monitor"  name="monitor">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
											<label><i class="fas fa-keyboard"></i> Keyboard</label>
											<input type="text" value="<?php echo $keyboard ?>" class="form-control" placeholder="Keyboard"  name="keyboard">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
											<label><i class="fas fa-mouse"></i> Mouse</label>
											<input type="text" value="<?php echo $mouse ?>" class="form-control" placeholder="Mouse"  name="mouse" >
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
											<label><i class="fas fa-headphones"></i> Headphone</label>
											<input type="text" value="<?php echo $headphone ?>" class="form-control" placeholder="Headphone"  name="headphone">
									</div>
								</div>
							
								<div class="col-12 col-md-6 offset-md-5 offset-lg-5">
										<button type="submit" id="pcbsubmit" hidden></button>
										<button type="button" id="pcconfig" onclick="myPcconfig()" class="btn btn-primary"><i class="fas fa-user-edit"></i> Update</button>
								</div>
								<div id="pcconfigalert" class="alert alert-success text-center" style="margin: 10px auto; padding: 1px 50px;" role="alert" hidden><i class="fas fa-check-circle"></i> Updated Successfully
								</div>
							</div>
						</form>    				
	  				</div>
				</div>
			</div>


			<div class="col-10 offset-1 col-sm-8 offset-sm-2 col-md-12 offset-md-0 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2" style="margin-bottom: 40px;">
				<div class="card border-primary font-weight-bold" style="background-color: #397792d1!important;">
			  		<div class="card-header bg-primary text-white" style="text-align: center;"><i class="fas fa-users"></i> Social</div>
			  		<div class="card-body">

			  			<form method="post" action="php/social.php" target="dummy">
							<div class="row">
								<div class="col-12 col-md-6">
									<label><i class="fab fa-steam"></i> Steam Profile Link</label>
									<div class="input-group mb-3">
  										<div class="input-group-prepend">
    										<span class="input-group-text" id="basic-addon1"><i class="fas fa-link"></i></span>
  										</div>
  										<input type="text" value="<?php echo $steam ?>" class="form-control" placeholder="Steam Profile Link" name="steam">
									</div>	
								</div>
								<div class="col-12 col-md-6">
									<label><i class="fab fa-umbraco"></i> Uplay Profile Name</label>
									<div class="input-group mb-3">
  										<div class="input-group-prepend">
    										<span class="input-group-text" id="basic-addon1"><i class="fas fa-at"></i></span>
  										</div>
  										<input type="text" value="<?php echo $uplay ?>" class="form-control" placeholder="Uplay Profile Name"  name="uplay">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<label><i class="fab fa-youtube"></i> Youtube Channel Link</label>
									<div class="input-group mb-3">
  										<div class="input-group-prepend">
    										<span class="input-group-text" id="basic-addon1"><i class="fas fa-link"></i></span>
  										</div>
  										<input type="text" value="<?php echo $youtube ?>" class="form-control" placeholder="Youtube Channel Link"  name="youtube">
									</div>									
								</div>
								<div class="col-12 col-md-6">
									<label><i class="fab fa-facebook"></i> Facebook Profile Link</label>
									<div class="input-group mb-3">
  										<div class="input-group-prepend">
    										<span class="input-group-text" id="basic-addon1"><i class="fas fa-link"></i></span>
  										</div>
  										<input type="text" value="<?php echo $facebook ?>" class="form-control" placeholder="Facebook Profile Link"  name="facebook">
									</div>	
									<div class="form-group">
											
											
									</div>
								</div>
								<div class="col-12 col-md-6">
									<label><i class="fab fa-instagram-square"></i> Instagram Profile Username</label>
									<div class="input-group mb-3">
  										<div class="input-group-prepend">
    										<span class="input-group-text" id="basic-addon1"><i class="fas fa-at"></i></span>
  										</div>
  										<input type="text" value="<?php echo $instagram ?>" class="form-control" placeholder="Instagram Profile Username" name="instagram">
									</div>								
								</div>
								<div class="col-12 col-md-6">
									<label><i class="fab fa-twitter"></i> Twitter Profile Username</label>
									<div class="input-group mb-3">
  										<div class="input-group-prepend">
    										<span class="input-group-text" id="basic-addon1"><i class="fas fa-at"></i></span>
  										</div>
  										<input type="text" value="<?php echo $twitter ?>" class="form-control" placeholder="Twitter Profile Username"  name="twitter">
									</div>	
								</div>
															
								<div class="col-12 col-md-4 offset-md-5 offset-lg-5">
									<button type="submit" id="sbsubmit" hidden></button>
									<button type="button" id="social" onclick="mySocial()" class="btn btn-primary"><i class="fas fa-user-edit"></i> Update</button>
								</div>
								<div id="socialalert" class="alert alert-success text-center" style="margin: 10px auto; padding: 1px 50px;" role="alert" hidden><i class="fas fa-check-circle"></i> Updated Successfully
								</div>
							</div>
						</form>								  				
			  		</div>
				</div>
			</div>



			<div class="col-10 offset-1 col-sm-8 offset-sm-2 col-md-12 offset-md-0 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2" style="margin-bottom: 40px;">
				<div class="card border-primary font-weight-bold" style="background-color: #397792d1!important;">
			  		<div class="card-header bg-primary text-white" style="text-align: center;"><i class="fab fa-youtube"></i> Youtube Videos</div>
			  		<div class="card-body">
			  			<div class="row" id="utube" style="margin-bottom: 20px;">
			  				<?php 
			  					if (isset($videos)) {
			  						$arrlength=count($videos);
			  						for ($x=0;$x<$arrlength;$x++) { 	  								
			  				?>
			  				<div class="col-12 col-md-6" id="ele<?php echo $videos[$x]; ?>">
				  				<div class="ytbox text-center" style="padding: 5%;background-color: #17e7f76e;margin-bottom: 20px;">
						  			<div class="embed-responsive embed-responsive-16by9" style="margin-bottom: 20px;">
			  							<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $videos[$x]; ?>" allowfullscreen></iframe>
									</div>	
									<form method="post" action="php/youtuberemove.php" target="dummy">
									<button type="submit" id="<?php echo $videos[$x]; ?>" value="<?php echo $videos[$x]; ?>" name="udel" hidden></button>
									<button type="button" id="b<?php echo $videos[$x]; ?>" onclick='myYouDel("<?php echo $videos[$x]; ?>")'  style="margin: auto;" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
									</form>							
								</div>
							</div>
							<?php  } } ?>
							
						</div>
			  			<form method="post" action="php/youtubeadd.php" target="dummy">
							<div class="row">
								<div class="col-12 col-md-6 offset-md-3">
									<label><i class="fab fa-youtube"></i> Youtube Video Link</label>
									<div class="input-group mb-3">
  										<div class="input-group-prepend">
    										<span class="input-group-text" id="basic-addon1"><i class="fas fa-link"></i></span>
  										</div>
  										<input type="text" onkeypress="return enter()" class="form-control" placeholder="Youtube Video Link" id="ytlink" name="ytlink">
									</div>	
								</div>														
								<div class="col-12 col-md-6 offset-md-5">
									<button type="submit" id="ytbsubmit" hidden></button>
									<button type="button" id="youtube" onclick="myYoutube()" class="btn btn-primary"><i class="fas fa-plus"></i> Add</button>
								</div>
								<div id="ytalertsuccess" class="alert alert-success text-center" style="margin: 10px auto; padding: 1px 50px;" role="alert" hidden>
								</div>
								<div id="ytalertnot" class="alert alert-danger text-center" style="margin: 10px auto; padding: 1px 50px;" role="alert" hidden>
								</div>
							</div>
						</form>	

			  		</div>
				</div>
			</div>




			<iframe name="dummy" hidden></iframe>

		</div>

	</div>
	

	<?php require "php/footer.php" ?>


	<script>
		function myUpload(){			
			var b=document.getElementById("upload");
			var s=document.getElementById("ubsubmit");
			b.innerHTML='<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Uploading...';
			setTimeout(function(){s.click(); b.innerHTML='<i class="fas fa-upload"></i> Upload Image';},1000);		
		}
		function myDetails(){			
			var b=document.getElementById("setdetails");
			var s=document.getElementById("dbsubmit");
			var a=document.getElementById("setdetailsalert");
			b.innerHTML='<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Updating...';
			setTimeout(function(){
				s.click();
				b.innerHTML='<i class="fas fa-user-edit"></i> Update';
				a.removeAttribute("hidden");},500);	
			setTimeout(function(){a.setAttribute("hidden","true");},2000);	
		}
		function myPcconfig(){			
			var b=document.getElementById("pcconfig");
			var s=document.getElementById("pcbsubmit");
			var a=document.getElementById("pcconfigalert");
			b.innerHTML='<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Updating...';
			setTimeout(function(){
				s.click();
				b.innerHTML='<i class="fas fa-user-edit"></i> Update';
				a.removeAttribute("hidden");},500);
			setTimeout(function(){a.setAttribute("hidden","true");},2000);		
		}
		function mySocial(){			
			var b=document.getElementById("social");
			var s=document.getElementById("sbsubmit");
			var a=document.getElementById("socialalert");
			b.innerHTML='<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Updating...';
			setTimeout(function(){
				s.click(); 
				b.innerHTML='<i class="fas fa-user-edit"></i> Update';
				a.removeAttribute("hidden");},500);	
				setTimeout(function(){a.setAttribute("hidden","true");},2000);	
		}
		var video=[
				<?php
				if (isset($videos)) {
			  		$arrlength=count($videos);
			  		for ($x=0;$x<$arrlength;$x++) {
			  			echo '"'; 
			  			echo $videos[$x];
			  			echo '"';
			  			if($x!=$arrlength-1)
			  				echo ",";
			  		}
			  	}
			  	?>];
		function myYoutube(){
			var inp=document.getElementById("ytlink");
			var input=inp.value;
			var b=document.getElementById("youtube");
			var s=document.getElementById("ytbsubmit");
			var as=document.getElementById("ytalertsuccess");
			var ad=document.getElementById("ytalertnot");
			var utube=document.getElementById("utube");
			var z1=input.search("https://youtu.be/");
				
			b.innerHTML='<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Adding...';
			setTimeout(function(){	
				if(z1==0){
				var link=input.replace("https://youtu.be/","");
				var lflag=1;
				inp.value=link;
				}
				var z2=input.replace("https://www.youtube.com/watch?v=","");
				if(z2!=input){
					var link=z2;
					var lflag=1;
					inp.value=link;
				}		
				//if Video ulr is wrong
				if(lflag!=1){
					ad.removeAttribute("hidden");
					ad.innerHTML='<i class="fas fa-exclamation-triangle"></i> Invalid Video Link';
					setTimeout(function(){
			  			ad.setAttribute("hidden","true");
			  		},2000);
			  		b.innerHTML='<i class="fas fa-plus"></i> Add';
			  		inp.value="";
			  		return;
				}
							
			  	for(var i=0;i<video.length;i++){
			  		if(video[i]==link){
			  			var flag=1;
			  			break;
			  		}
			  	}
			  	b.innerHTML='<i class="fas fa-plus"></i> Add';
			  	//if video already added
			  	if(flag==1){
			  		ad.removeAttribute("hidden");
			  		ad.innerHTML='<i class="fas fa-exclamation-triangle"></i> Video Already Added';
			  		inp.value="";
			  		setTimeout(function(){
			  			ad.setAttribute("hidden","true");
			  		},2000);
			  	}
			  	//if video not already added then add it
			  	else{
			  		as.removeAttribute("hidden");
			  		as.innerHTML='<i class="fas fa-check-circle"></i> Video Added Successfully';
			  		s.click();
			  		inp.value="";
			  		video.push(link);
			  		var div = document.createElement("DIV");
  					div.innerHTML = '<div class="ytbox text-center" style="padding: 5%;background-color: #17e7f76e;margin-bottom: 20px;">'+
						  			'<div class="embed-responsive embed-responsive-16by9" style="margin-bottom: 20px;">'+
			  							'<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/'+link+'" allowfullscreen></iframe>'+
									'</div>'+	
									'<form method="post" action="php/youtuberemove.php" target="dummy">'+
									'<button type="submit" id="'+link+'" value="'+link+'" name="udel" hidden></button>'+
									'<button type="button" id="b'+link+'" onclick='+'myYouDel("'+link+'")  style="margin: auto;" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>'+
									'</form>'+							
								'</div>';
					div.setAttribute("class","col-12 col-md-6");
					div.setAttribute("id","ele"+link);
  					utube.appendChild(div);
			  		setTimeout(function(){
			  			as.setAttribute("hidden","true");
			  		},2000);
			  	}

			},2000);
		}
		function myYouDel(link){
			var b=document.getElementById("b"+link);
			var s=document.getElementById(link);
			var ele=document.getElementById("ele"+link);
			b.innerHTML='<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Deleting...';
			setTimeout(function(){
				s.click();
				for(var i=0;i<video.length;i++){
			  		if(video[i]==link){
			  			video[i]="";
			  			break;
			  		}
			  	}
				ele.remove();},1000);	
			
		}
		function enter() {
  			if(window.event && window.event.keyCode == 13){
  				myYoutube();
  				return false;
			}	
		}
    	if ( window.history.replaceState ) {
        	window.history.replaceState( null, null, window.location.href );
    	}
	</script>

</body>
</html>