<?php
	session_start();
	require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body class="regBody">

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




		<div class="Questions">
		<div class="containerQL">
			<h1>All products</h1>

		<?php
      $products=mysqli_query($con,"SELECT name,imgPath FROM product");
      while($rowz=mysqli_fetch_array($products)){
          echo '<div class="rowF">
				<div class="containerQ">
					<h3>'.$rowz['name'].'</h3>
					<p>Here some text</p>
					<div class="likeDislike">
						<img src="'.$rowz['imgPath'].'" />
					</div>
					<div class="details">
						<div class="one">
						</div>
						<div class="two">
							<span>user</span>
							<span>date</span>	
						</div>
					</div>
				</div>
			</div>';
			} ?>
		</div>
	</div>



	
	<script type="text/javascript" src="js/main.js"></script>
</body>
</html>
