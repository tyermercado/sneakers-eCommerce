
<?php

$host = 'localhost';
$username = "root";
$password = "";
$database = "contacts";

$con = new mysqli($host, $username, $password, $database);

if($con->connect_error){
    echo $con->connect_error;
}


if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $sub = $_POST['subject'];
    $message = $_POST['message'];

      $insert = "INSERT INTO `contact_form` (`Name`, `Email`, `Subject`, `Message`) 
             VALUES ('$name', '$email' , '$sub' , '$message')";
                echo '<script>alert("Review successfully sent!")</script>';
                $con->query($insert) or die ($con->error);


}

?>


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Contact Form</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./css/contacts.css">

</head>
<body>
<!-- Contact Form -->
<div class="container">
	<form class="form-container" method="post">
		<div class="headline"><span>Contact Us</span></div>
		<div class="form-line">
			<input type="text" class="form-input" name="name">
			<label class="top">Name</label>
			<div class="check-label"></div>
		</div>
		<div class="form-line">
			<input type="text" class="form-input" name="email" required>
			<label>Email *</label>
			<div class="error-label">Field is required!</div>
			<div class="check-label"></div>
		</div>
		<div class="form-line">
			<input type="text" class="form-input" name="subject">
			<label>Subject</label>
			<div class="check-label"></div>
		</div>
		<div class="form-line">
			<textarea class="form-input" name="message" required></textarea>
			<label>Message</label>
			<div class="check-label"></div>
			<div class="error-label">Field is required!</div>
		</div>

		<input type="submit" name="submit" class="form-button" value="Submit" >
	</form>
</div>
<!-- JS -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>'
  <script  src="./js/contact.js"></script>

</body>
</html>
