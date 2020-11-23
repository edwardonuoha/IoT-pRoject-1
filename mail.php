<?php 
if($_GET['temperature']>30 && $_GET['humidity']<80 && $_GET['ppm']<1.00){
	$message="Your Building Temperature Is Going High";
}
elseif($_GET['humidity']>80 && $_GET['temperature']<30 && $_GET['ppm']<1.00){
	$message="Your Building Humidity Is Going High";
}
elseif($_GET['humidity']<80 && $_GET['temperature']<30 && $_GET['ppm']>1.00){
	$message="Your Building PPM Is Going High";
}
elseif($_GET['humidity']<80 && $_GET['temperature']>30 && $_GET['ppm']>1.00){
	$message="Your Building Temperature and PPM Is Going High";
}
elseif($_GET['humidity']>80 && $_GET['temperature']<30 && $_GET['ppm']>1.00){
	$message="Your Building Humidity and PPM Is Going High";
}
elseif($_GET['temperature']>30 && $_GET['humidity']>80 && $_GET['ppm']>1.00){
	$message="Your Building Temperature, Humidity and PPM All Going High";
}
require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->SMTPDebug = 1;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';         				// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'onuohaedward1@gmail.com';            // SMTP username
$mail->Password = 'swizz1137';               // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to
$mail->addReplyTo('mbtz@gmail.com','Mazhar');
$mail->setFrom($building_mail, $building_name);

$mail->addAddress($building_mail);     // Add a recipient
$mail->addAddress($building_mail);      // Name is optional



$mail->Subject = 'Warning Message';
$mail->Body    = '<html>
<body>
<p>'.$message .'</p>
</body>
</html>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
else {
     header('Location: dashboard.php');
}
?>