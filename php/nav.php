<nav class="navbar navbar-expand-md fixed-top navbar-dark bg-info">
		<div class="container">
			<a href="index.php" class="navbar-brand"><img src="logo/logo.png" width="30" height="30" class="d-inline-block align-top" alt=""><b> Th€ Unknow$</b></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    					<span class="navbar-toggler-icon"></span>
  				</button>
				
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto">
					<?php if (!isset($_SESSION["user"])) { ?>
					<li class="nav-item"><a class="nav-link" href="signup.php"><i class="fas fa-user"></i> Sign Up</a></li>
					<li class="nav-item"><a class="nav-link" href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a></li>
					<?php } 
					else{ ?>
					<li class="nav-item"><a class="nav-link" href="logged.php"><i class="fas fa-user"></i> <?php echo $_SESSION["user"] ?></a></li>
					<li class="nav-item"><a class="nav-link" href="php/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
				    <?php } ?>
				</ul>
			</div>
		</div>
	</nav>

