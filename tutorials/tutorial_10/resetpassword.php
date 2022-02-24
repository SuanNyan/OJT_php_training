<?php
  use PHPMailer\PHPMailer\PHPMailer;

  if(isset($_POST['btnconfirm'])){
$email = $_POST['txtemail'];
        require_once 'phpmailer/Exception.php';
        require_once 'phpmailer/PHPMailer.php';
        require_once 'phpmailer/SMTP.php';
    require_once "vendor/autoload.php";
    $mail = new PHPMailer(true);
    
    //Enable SMTP debugging.
    $mail->SMTPDebug = false;                               
    //Set PHPMailer to use SMTP.
    $mail->isSMTP();            
    //Set SMTP host name                          
    $mail->Host = "smtp.gmail.com";
    //Set this to true if SMTP host requires authentication to send email
    $mail->SMTPAuth = true;                          
    //Provide username and password     
    $mail->Username = "suanthnjobs@gmail.com";                 
    $mail->Password = "Suanisworkingnowto1";                           
    //If SMTP requires TLS encryption then set it
    $mail->SMTPSecure = "tls";  
    //$mail->SMTPSecure = false;
    //Set TCP port to connect to
    $mail->Port = 587;                                   
    
    $mail->From = "suanthnjobs@gmail.com";
    $mail->FromName = "User Website Login System";
    
    $mail->addaddress("$email", "Recepient Name");
    
    $mail->isHTML(true);
    
    $mail->Subject = "Reset Password for your account";
    $mail->Body = " This is the rest button to redirect you to the reset password. <a href='http://localhost/tutorials/tutorial_10/updatepassword.php'><input type='button' value='Reset Password'></a>";
    $mail->AltBody = "This is the plain text version of the email content";
    
    try {
        $mail->send();
        echo "Message has been sent successfully";
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutorial10</title>
</head>
<body>
   <form action="resetpassword.php" method="POST" enctype="multipart/form-data"> 
 email:<input type="email" name="txtemail"><br><br>
  <a href="updatepassword.php"><button type="submit" name="btnconfirm">Confirm Email to reset password</button></a>
  </form>
</body>
</html>