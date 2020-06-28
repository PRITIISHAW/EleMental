<?php
	require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-image: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)),url(reg.jpg);
	height: 100vh;
	background-size: cover;
	background-position: center;">

	<div id="main-wrapper">
		<center>
			<h2>Registration Form</h2>
			<img src="images/avatar.png" class="avatar"/>
		</center>

		<form class="myform" action="register.php" method="post">
			<label><b>Username:</label><br>
			<input name="username" type="text" class="inputvalues" placeholder="Type your username" required/><br>
			<label><b>Password:</label><br>
			<input name="password" type="password" class="inputvalues" placeholder="Your password" required/><br>
			<label><b>Confirm Password:</label><br>
			<input name="cpassword" type="password" class="inputvalues" placeholder="Confirm password" required/><br>
			<input name="submit_btn" type="submit" id="signup_btn" value="Sign Up"/><br>
			<a href="index.php"><input type="button" id="back_btn" value="Back"/><br>
		</form>

		<?php
		if(isset($_POST['submit_btn']))
		{
			//echo '<script type="text/javascript"> alert("Sign up button clicked") </script>';
			$username = $_POST['username'];
			$password = $_POST['password'];
			$cpassword = $_POST['cpassword'];

			if($password==$cpassword)
			{
				$query="select * from user WHERE username='$username'";
				$query_run = mysqli_query($con,$query);

				if(mysqli_num_rows($query_run)>0)
				{
					//there is already a user with the same username
					echo '<script type="text/javascript"> alert("User already exists.. try another username") </script>';
				}
				else
				{
					$query= "insert into user values('$username','$password')";
					$query_run = mysqli_query($con,$query);

					if($query_run)
					{
						echo '<script type="text/javascript"> alert("User Registered.. Go to login page to login") </script>';
					}
					else
					{
						echo '<script type="text/javascript"> alert("Error!") </script>';
					}


				}
			}
			else{
				echo '<script type="text/javascript"> alert("Password and confirm password does not match") </script>';
			}
		}

		?>
	</div>
	</body>
	</html>