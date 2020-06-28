<!DOCTYPE html>
<html>
<head>
	<title>Contact Us</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/cont.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
	<form method="post" action="">
	<div class="container">
		<div class="contact-box">
			<div class="left"></div>
			<div class="right">
				<h2>Contact US</h2>
				<input type="text" name="name" class="field" placeholder="Your Name" required>
				<input type="email" name="email" class="field" placeholder="Your Email" required>
				<input type="text" name="phone" class="field" placeholder="Your Phone" required>
				<textarea class="field area" name="message"placeholder="Message" required></textarea>
				<div class="g-recaptcha" data-sitekey="6LfYb9YUAAAAAGVAbJR-K10J6TFWjA8VQAR0NhBn"></div>
				<input type="submit" name="submit" value="Send"  class="submit-btn">
			</div>
		</div>
	</div>
</form>

<div class="status">

<?php
if(isset($_POST['submit']))
{
	$User_name = $_POST['name'];
	$user_email = $_POST['email'];
	$phone = $_POST['phone'];
	$user_message = $_POST['message'];

	$email_from = 'pritishaw2018@gmail.com';
	$email_subject = "New Form Submission";
	$email_body = "Name: ".$User_name."\n".
					"Phone No: ".$phone."\n".
					"Email Id: ".$user_email."\n".
					"User Message: ".$user_message."\n.";

	$to_email = "pritishaw1220@gmail.com";
	$headers = "From: ".$email_from."\n";
	$headers .= "Reply-To: ".$user_email."\n";


	$secretKey = "6LfYb9YUAAAAALOOZTciXnbYjkBynsqBiVfhTvW7";
	$responseKey = $_POST['g-recaptcha-response'];
	$UserIP = $_SERVER['REMOTE_ADDR'];
	$url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$UserIP";
	$response = file_get_contents($url);
	$response = json_decode($response);

	if($response->success)
	{
		mail($to_email,$email_subject,$email_body,$headers);
		echo "Message sent Successfully. "." " .$User_name.", we will contact you shortly.";

	}
	else
	{
		echo "<span>Invalid Captcha, Please Try Again</span>";
	}
}
?>
</body>
</html>
