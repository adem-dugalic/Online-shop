<?php
require 'dbconfig/config.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
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
						  <button class="dropbtn">Categories</button>
						  <div class="dropdown-content">
						    <a href="#">Cars</a>
						    <a href="#">Phones</a>
						    <a href="#">Laptops</a>
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

 <div class="regForm">
 	<div class="containerR">
		<form class="register" method="post" action="loginRegister.php">
				<h2>Login</h2>
				<div class="rowF">
					<div class="colF">
						<div class="inputBox">
							<input type="text" name="username" required="required">
							<span class="textF" id="user">Username</span>
							<span class="lineF"></span> 
						</div>
					</div>
				</div>
				<div class="rowF">
					<div class="colF">
						<div class="inputBox">
							<input type="password" name="password" required="required">
							<span class="textF" id="pas">Password</span>
							<span class="lineF"></span> 
						</div>
					</div>
				</div>
				<div class="rowF">
					<div class="colF">
						<div class="btnCont">
							<input type="submit" name="login" value="LogIn">
						</div>
					</div>
				</div>
			</form>
			<div class="redirect">
				<a href="#" id="regbtn">Don't have an account? Register!</a>
			</div>
		</div>	
	</div>


	<!-- Register -->

	<div class="regForm1 ">
		<div class="containerR">
		<form class="register" method="post" action="loginRegister.php">
				<h2>Register</h2>
				<div class="rowF">
					<div class="colF">
						<div class="inputBox">
							<input type="text" name="username1"required="required"/>
							<span class="textF">Username</span>
							<span class="lineF"></span> 
						</div>
					</div>
					<div class="colF">
						<div class="inputBox">
							<input type="text" name="email" id="emailText" required="required"/>
							<span class="textF" id="email1">Email</span>
							<span class="lineF"></span> 
						</div>
					</div>
				</div>
				<div class="rowF">
					<div class="colF">
						<div class="inputBox">
							<input type="password" name="password1" id="password"  required="required"/>
							<span class="textF" >Password</span>
							<span class="lineF"></span> 
						</div>
					</div>
					<div class="colF">
						<div class="inputBox">
							<input type="password" name="cpassword" required="required"/>
							<span class="textF">Confirm Password</span>
							<span class="lineF"></span> 
						</div>
					</div>
				</div>
				<div class="rowF">
					<div class="colF">
						<div class="btnCont">
							<input type="submit" name="register" id="registerbutton" value="Register"/>
						</div>
					</div>
				</div>
		</form>
		<div class="redirect">
				<a href="#" id="logbtn">Have and account? Log In!</a>
		</div>
			<div id="message">
			  <h3 id="blah">Password must contain the following:</h3>
			  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
			  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
			  <p id="number" class="invalid">A <b>number</b></p>
			  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
			</div>
		</div>
		
	</div>


	<script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript" src="js/jQuery.js"></script>
</body>
</html>


	<?php

    //#######################################################################################
	//Log in
    //#######################################################################################

    if(isset($_POST['login'])){

			if($_POST['username']==""||$_POST['password']==""){
				echo '<script type="text/javascript"> 
						document.getElementById("user").innerHTML = "Invalid Username or Password";
		                document.getElementById("pas").innerHTML = "Invalid Username or Password";
              		</script> ';
			}else{
			$username = $_POST['username'];
			$password = $_POST['password'];

			$query = "select * from user WHERE username= '$username' AND password='$password'";
			$query_run = mysqli_query($con,$query);

			if(mysqli_num_rows($query_run)>0){
				$_SESSION['username'] = $username;
        		$_SESSION['active'] = "active";
        		$n = mysqli_fetch_array($query_run);
        		$_SESSION['id'] = $n['ID'];
				echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
			}else{
				echo '<script type="text/javascript"> 
						document.getElementById("user").innerHTML = "Invalid Username or Password";
		                document.getElementById("pas").innerHTML = "Invalid Username or Password";
              		</script> ';
			}
		}
		
	} 

    //#######################################################################################
    //Register
    //#######################################################################################

  if(isset($_POST['register'])){

    $username1 = $_POST['username1'];
    $password1 = $_POST['password1'];
    $cpassword = $_POST['cpassword'];
    $email = $_POST['email'];

    if($password1 == $cpassword){

      $query = "select * from user WHERE username= '$username1' ";

      $query_run = mysqli_query($con,$query);
      if(mysqli_num_rows($query_run)>0){
        echo '<script type="text/javascript"> alert("Error") </script> ';
      }else{
        $query = "insert into user(username, password, email) values ('$username1','$password1','$email') ";
        $query_run = mysqli_query($con,$query);
        if($query_run){
          echo '<script type="text/javascript"> alert("Registration complete go to login page") </script> ';
        }else{
          echo '<script type="text/javascript"> alert("Error") </script> ';
        }
      }
    }else{
      echo '<script type="text/javascript"> alert("Error, no match") </script> ';
    }
  }

	?>
