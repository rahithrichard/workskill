<?php
error_reporting(0);
    include ('connection.php');

if(isset($_POST['submit'])){
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

   $check =mysqli_query($con,"SELECT * FROM users where email_id='$email' OR phone='$phone'");
   $count=mysqli_num_rows($check);
   if($count == ''){

   

   $sql = "INSERT INTO users(name, email_id, phone,resume) values ('$name', '$email', '$phone', '$file')";
   $success = mysqli_query($con,$sql);

if($success)
{
    $msg = '<h3 style="color:green;">Inserted Success</h3>';


$path = 'resume/' . $_FILES["efile"]["name"];
 move_uploaded_file($_FILES["efile"]["tmp_name"], $path);
 $message = '
  <h3 align="center">User Details</h3>
  <table border="1" width="100%" cellpadding="5" cellspacing="5">
   <tr>
    <td width="30%">Name</td>
    <td width="70%">'.$_POST["name"].'</td>
   </tr>
   <tr>
    <td width="30%">Email Address</td>
    <td width="70%">'.$_POST["email"].'</td>
   </tr>
   <tr>
    <td width="30%">Phone Number</td>
    <td width="70%">'.$_POST["phone"].'</td>
   </tr>
  </table>
 ';
 
 require 'PHPMailer/class.phpmailer.php';
 $mail = new PHPMailer;

 $mail->From = $_POST["email"];     //Sets the From email address for the message
 $mail->FromName = $_POST["name"];    //Sets the From name of the message
 //To address and name
$cumail="rahithrichard@gmail.com";
$mail->addAddress($cumail);
 
 $mail->AddAddress('newageskills.com', 'Skills');  //Adds a "To" address
 $mail->WordWrap = 50;       //Sets word wrapping on the body of the message to a given number of characters
 $mail->IsHTML(true);       //Sets message type to HTML
 $mail->AddAttachment($path);     //Adds an attachment from a path on the filesystem
 $mail->Subject = 'Application for User Registration';    //Sets the Subject of the message
 $mail->Body = $message;       //An HTML or plain text message body
 $mail->Send();


}
else
{
    $msg = '<h3 style="color:red;">Inserted Failed</h3>';
}

}
else{
    $msg = '<h3 style="color:red;">Already exist</h3>';
}

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Appy job</title>
<link rel="shortcut icon" href="img/iconlogo.png"/>


    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Submit Application for Skill Program</h2>

<?php echo $msg;?>

                    <form method="POST"  enctype="multipart/form-data">
                        <div class="input-group">
                            <input class="input--style-1" type="name" placeholder="NAME" name="name" required>
                        </div>
                         <div class="input-group">
                            <input class="input--style-1" type="email" placeholder="EMAIL" name="email" required="EMAIL">
                        </div>
                          <div class="row row-space">
                             <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="tel" placeholder="PHONE" name="phone" pattern="^\d{3}\d{3}\d{4}$" required>
                                </div>
                            </div>

                            <!-- <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1 js-datepicker" type="text" placeholder="BIRTHDATE" name="birthday" required>
                                    <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                </div>
                            </div> -->
                            <!-- <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="job">
                                            <option disabled="disabled" selected="selected">JOB</option>
                                            <option>BPO</option>
                                            <option>IT</option>
                                            <option>Other</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <div class="rectangle" align="centre">
                            &emsp;&nbsp;&nbsp;Upload Resume
                            <div style="padding: 20px;">
                               <input type="file" value="fileupload" name="efile" id="fileupload">
                            </div>
                        </div>
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" name="submit" type="submit" value="send">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body>

</html>
<!-- end document-->
