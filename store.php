<?php
	include ('connection.php');
	echo "connected";
	?>
<?php
	$name = $_POST['name'];
	$email = $_POST['email_id']; 
	$phone = $_POST['phone'];
	$subject = $_POST['sub'];
	$message = $_POST['msg'];

// $sql=mysqli_query($con,"INSERT INTO contacts (name, email_id, phone, subject, message) VALUES ()");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Thankyou</title>
</head>
<body>
<div class="container">
	<h1>Thankyou we will meet you soon <?php echo "$name";  ?></h1>
	
</div>
</body>
</html>