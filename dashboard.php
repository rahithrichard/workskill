<?php 

	error_reporting(0);
    include ('connection.php');

	if(isset($_POST['submit'])){
    $price = $_POST['price'];
    $header = $_POST['header']; 
    $location = $_POST['location'];
    $discription = $_POST['discription'];
    $editor = $_POST['editor1'];

     $sql = "INSERT INTO browse_job(price_range, header,discription,qualification,pay_scale,location) values ('$price', '$header', '$location', '$discription',$location)";
   $success = mysqli_query($con,$sql);

   if($success)
{
    $msg = '<h3 style="color:green;">Inserted Success</h3>';
}
else
{
    $msg = '<h3 style="color:red;">Inserted Failed</h3>';
}
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/css/mdb.min.css" rel="stylesheet">
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
</head>
<body>
	<div class="container">
        <div class="jumbotron">
        	<center>
        	<h1>Dashboard</h1>
        	</center>

        </div>
        <?php echo $msg;?>
        <div class="container">
        	<div class="container-fluid">
        	<h2>Add jobs</h2>
        	</div>
        	<?php echo $msg;?>
	<form>
		<div class="row">
		<div class="form-group col-4">
    <label for="exampleFormControlInput1">Price Range</label>
    <input type="text" class="form-control" name="price" placeholder="15000-20000">
  </div>
  <div class="form-group col-4">
    <label for="exampleFormControlSelect1">Header</label>
    <input type="text" class="form-control" name="header" placeholder="BPO/JAVA">
  </div>
</div>
 <div class="row">
		<div class="form-group col-4">
    <label for="exampleFormControlInput1">Ḷocation</label>
    <input type="text" class="form-control" name="locaton" placeholder="bangalore">
  </div>
<!--   <div class="form-group col-4">
    <label for="exampleFormControlSelect1">Header</label>
    <input type="text" class="form-control" name="header" placeholder="BPO/JAVA">
  </div> -->
</div>
<div class="row">
  <div class="form-group col-4">
    <label for="exampleFormControlSelect2">Discription</label>
    <textarea class="form-control"  name="discription" placeholder="type details" rows="15"></textarea>
  </div>
  <div class="form-group col-4">
    <label for="exampleFormControlTextarea1">Must have</label>
    <textarea class="form-control" name="editor1"  placeholder="Skills"></textarea>
  </div>
</div>

		 <div class="border border-primary"><center>
             <button class="btn btn--radius btn--green" name="submit" type="submit" value="send">ADD</button>
             </center>
         </div>

	</form>
</div>
</div>
  <script>
      CKEDITOR.replace( 'editor1' );
   </script>

</body>
</html>