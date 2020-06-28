<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-image: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)),url(about.jpg);
	height: 100vh;
	background-size: cover;
	background-position: center;">

	<div id="main-wrapper">
		<center>
			<h2>Home Page</h2>
			<h3>Welcome
				<?php echo $_SESSION['username'] ?>
			 </h3>
			<img src="images/avatar.png" class="avatar"/>
			<a href="http://localhost:10080/SampleLoginPage/we/we.html"><input type="submit" id="logout_btn" value="Talk to our experts"/></a><br>
		</center>

		<form class="myform" action="homepage.php" method="post">

			<input name="logout" type="submit" id="logout_btn" value="Log Out"/><br>

			
		</form>

		<?php
			if(isset($_POST['logout']))
			{
				session_destroy();
				header('location:index.php');
			}
		?>
	</div>
	</body>
	</html>