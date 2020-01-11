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


	<div class="profile">
		<div class="container">
			<div class="insideContainer">
				<form method="post" action="edit.php">
					<div class="profileNav">
					</div>
					<img src="img/user.png"/>
					<div class="labels">
						<input id="name" name="ename" type="text" value="<?php echo $_SESSION['username'];?>" style="text-align: center"/>
						<!--<label id="usern">Username</label>-->
					</div>
					<hr/>
					<div class="info">
						<label class="profileLab">Article1</label>
						<label class="profileLab">Article2</label>
						<label class="profileLab">Article3</label>
					</div>
					<div class="points">
						<button name="exit">Exit Edit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="js/main.js"></script>
</body>
</html>


<?php
	if (isset($_POST['exit'])) {
		$id=$_SESSION['id'];
		$username = $_POST['ename'];
		$query = "UPDATE user SET username='$username' WHERE id = '$id'";
		$_SESSION['username'] = $username;
		mysqli_query($con,$query);
		header('location: account.php');
	}
?>