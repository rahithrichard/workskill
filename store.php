<?php
	include ('connection.php');

	$name = $_POST['name'];
	$email = $_POST['email']; 
	$phone = $_POST['phone'];


    $file = $_FILES['efile']['name'];
   $path = pathinfo($file);
   $ext = $path['extension'];
   $file = $file;
   $file_loc = $_FILES['efile']['tmp_name'];
   $file_size = $_FILES['efile']['size'];
   $file_type = $_FILES['efile']['type'];
   $folder = "resume/";
if(move_uploaded_file($file_loc, $folder . $file)) {
        $file=$file;
   }
   else
   {
       $file="";
   }
	// $resume = $_POST['file'];
	// $message = $_POST['msg'];
	// if($resume!=''){

   $sql = "insert into users(name, email_id, phone,reume) values ('$name', '$email', '$phone', '$file')";
   $success = mysqli_query($con,$sql);

if($success)
{
	echo "success";
}
else
{
	echo "error";
}

	//	$query = mysqli_query($con,"insert into users(name, email_id, phone,reume) values ('$name', '$email', '$phone', '$file')");
	//	echo "succes";
	// }
	// else{
	// 	echo "failed";
	// }

// $sql=mysqli_query($con,"INSERT INTO contacts (name, email_id, phone, subject, message) VALUES ()");
?>
<!-- <!DOCTYPE html>
<html>
<head>
	<title>Thankyou</title>
</head>
<body>
<div class="container">
	<h1>Thankyou we will meet you soon <?php echo "$name";  ?></h1>
	
</div>
</body>
</html> -->