<?php
session_start();
require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Online market</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="header-div">
		<div class="navigation-div">
			<div class="logo-div">
				<img src="img/skeri.png">
				<h2>Skerizone</h2>
			</div>
			<div class="search-div">
				<input id="search" type="text" placeholder="Search..">
				<img src="img/search.png">
			</div>
				<ul class="links">
					<li>
						<?php if($_SESSION['active'] == "active"){ ?>
						<a href="account.php" id="LogReg"><img id="one" src="img/user.png"><br><spam><?php echo $_SESSION['username']; ?></spam></a>
						<?php }else{ ?>
						<a href="loginRegister.php" id="LogReg"><img id="one" src="img/user.png"><br><spam><?php echo $_SESSION['username']; ?></spam></a>
						<?php } ?>
					</li>
					<li>
						<a href="index.php">Home</a>
					</li>
					<li>
						<div class="dropdown">
						  <button class="dropbtn">Articles</button>
						  <div class="dropdown-content">
						    <a href="newProduct.php">New</a>
						    <a href="list.php">All</a>
						  </div>
						</div>
					</li>
					<li>
						<?php if($_SESSION['active'] == "active"){ ?>
						<form method="post" action="index.php"><button class="btnnn" name="logout">LogOut</button></form>
						<?php }else{ ?>
						<a href="loginRegister.php">Login</a>
						<?php } ?>
					</li>
				</ul>
				<div class="menu">
					<div class="line1"></div>
					<div class="line2"></div>
					<div class="line3"></div>
				</div>

		</div>

			 <div class="center-container">
				<span class="circle dd" onclick="currentDiv(1)"></span>
			    <span class="circle dd" onclick="currentDiv(2)"></span>
			    <span class="circle dd" onclick="currentDiv(3)"></span>
			 </div>
		<!-- background slide show maybe -->
	</div>

	<div class="popular-div">
		<!-- popular offers and deals -->
	</div>
	<script type="text/javascript" src="js/main.js"></script>
</body>
</html>



<?php
    if(isset($_POST['logout'])){
    session_destroy();
    unset($_SESSION['active']); 
    header('location: landing.php');
  }
  ?>