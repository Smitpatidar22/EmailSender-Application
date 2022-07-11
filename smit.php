 <?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);


if(isset($_POST['submit'])){

	$to = $_POST['to'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];


	try {
		//Server settings
		$mail->SMTPDebug = FALSE;                      //Enable verbose debug output
		$mail->isSMTP();                                            //Send using SMTP
		$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
		$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
		$mail->Username   = 'your email id';                     //SMTP username
		$mail->Password   = 'your email  2 step verification password';                               //SMTP password
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
		$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
	
		//Recipients
		$mail->setFrom('your email id', 'Summer internship');
		$mail->addAddress($to, '');     //Add a recipient
	   
	
	
		//Content
		$mail->isHTML(true);                                  //Set email format to HTML
		$mail->Subject = $subject;
		$mail->Body    = $message;
		
	
		$mail->send();
		echo "<script> alert('Your message sent successfully ');</script>";
	} 
	catch (Exception $e) 
	{
		echo "<script> alert('Your message not sent');</script>";
	}

 } 

?>
<!DOCTYPE html>
<html>
<head>
	<title>Email Send Application</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style type="text/css">
  	body{

  		text-align: center;
/*   	
  		margin: 50px;
		margin-right:20px; */
  		
  		color: black;
		background-color: rgb(175, 231, 234);
  	}
	nav{
		width:100%;
		height:30px;
		background-color: rgb(10 50 90);
	}

	#smit{
		weight: 70%;
		height:50%;
		margin: 100px;


	}
	.bottam{
		width:100%;
		height:30px;
		background-color: rgb(10 50 90);
		color:white;

	}
	


  </style>
</head>
<body >
	<div >
	<nav class="navbar" >

	<ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="#">Home</a>
  </li>
 
</ul>

	


  
    </nav>


	</div>

	<h1 class="form-row align-items-center">Email Send Application</h1>
	<div class="form-row" id="smit">

	<form  id="smit" method="post">
         <div class="col">
		<label >To</label>
		<input type="text" class="form-control" name="to"><br>
	</div>

     <div class="col">
		<label>Subject</label>
		<input type="text" class="form-control" name="subject"><br>
	</div>

		<label>Message</label>
		<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message"></textarea><br>
     <div class="btn btn-success">
	<input  class ="btn btn-success" type="submit" name="submit" value="send mail">	
     </div>
	</form>
</div>

<div class="bottam">
	<h3>@Copyright</h3>
</div>

</body>
</html>