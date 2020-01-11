<?php
	session_start();
	require 'dbconfig/config.php';
	if($_SESSION['active'] != "active"){
		header('location: landing.php');
	}
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
			 <form method="post" action="newProduct.php" enctype="multipart/form-data">
					<div class="profileNav">
					</div>
					<img id="uploadPreview"src="img/product.png"/> <br>
					<input type="file" id="imglink" name="imglink" accept=".jpg,.jpeg,.png" onchange="PreviewImage();"/>

					<div class="labels">
						<input type="text" name="articleName" id="name" style="text-align: center" placeholder="product name">
						<!--<label id="usern">Username</label>-->
					</div>
					<hr/>
					<div class="info">
					
					</div>
					<div class="points">
						<button name="confirm">Confirm</button>
					</div>
				</form>
				</div>
		</div>
	</div>
	<script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript">
			    function PreviewImage() {
			        var oFReader = new FileReader();
			        oFReader.readAsDataURL(document.getElementById("imglink").files[0]);

			        oFReader.onload = function (oFREvent) {
			            document.getElementById("uploadPreview").src = oFREvent.target.result;
			        };
			    };
		</script>
</body>
</html>

<?php

	if(isset($_POST['confirm'])){
		
			if(isset($_FILES['imglink'])){
				$img_name = $_FILES['imglink']['name'];
				$img_size =$_FILES['imglink']['size'];
				$img_tmp =$_FILES['imglink']['tmp_name'];
				echo $img_name;
				$directory = 'uploads/';
				$target_file = $directory.$img_name;
			}else{
				$directory = 'uploads/product.png';
				$target_file = $directory;
			}

			if($target_file=="uploads/"){
				$target_file = 'uploads/product.png';
			}

			$name = $_POST['articleName'];

			move_uploaded_file($img_tmp,$target_file);

			$query= "insert into product(name,imgName,imgPath) values ('$name','$img_name','$target_file')"; 
			$query_run = mysqli_query($con,$query);
			header('location: index.php');
			
	}
?>