<?php
include('mysql.php');
if ($_POST['email'] && $_POST['password'] && $_POST['name']){

	$activationKey =  mt_rand() . mt_rand() . mt_rand() . mt_rand() . mt_rand();
	$name = mysql_real_escape_string($_POST['name']);
	$email = mysql_real_escape_string($_POST['email']);
	$password = mysql_real_escape_string($_POST['password']);
	$salt = hash('sha256', uniqid(mt_rand(), true) . 'something random' . strtolower($email));
 
	// Prefix the password with the salt
	$hash = $salt . $password;
 
	// Hash the salted password a bunch of times
	for ( $i = 0; $i < 100000; $i ++ )
	{
    		$hash = hash('sha256', $hash);
	}
 
// Prefix the hash with the salt so we can find it back later
	
	include('mysql.php');

	$hash = $salt . $hash;
	/*echo "$hash\n";
	echo "$activationKey\n";*/
	$sql="INSERT INTO users (name, email, hash, activationkey) VALUES ('$name', '$email', '$hash', '$activationKey')";
	if (!mysql_query($sql))
  	{

  		die('Error: ' . mysql_error());

  	}

 	else {
		
	}
	session_start();
	$_SESSION['email']=$email;
	$_SESSION['hash']=$hash;
	echo "An email has been sent to $_POST[email] with an activation key. Please check your mail to complete registration.";
	$Str_Location="http://www.fancykart.com/tm/";
		if(!headers_sent())
        {
            header('location: ' . urldecode($Str_Location), 1, NULL);
            exit;
        }

    exit('<meta http-equiv="refresh" content="3; url=' . urldecode($Str_Location) . '"/>'); # | exit('<script>document.location.href=' . urldecode($Str_Location) . ';</script>');
   // return;

	$to      = $email;

	$subject = "Activation of Registration to FancyKart.com";

	$message = "Welcome to our website!\r\rYou, or someone using your email address $email, has completed registration at <a href='http://www.fancykart.com'>www.fancykart.com</a>. You can complete registration by clicking the following link:\rhttp://www.fancykart.com/verify.php?$activationKey\r\rIf this is an error, ignore this email and you will be removed from our mailing list.\r\rRegards,\ <a href='http://www.fancykart.com'>www.fancykart.com</a> Team \r\r FancyKart.com created by <a href='http://www.twitter.com/SanjibNarzary'>Sanjib Narzary</a> Follow Him on Twitter.";

	$headers = 'From: no-reply@fancykart.com' . "\r\n" .

    		'Reply-To: no-reply@fancykart.com' . "\r\n" .

    		'X-Mailer: PHP/' . phpversion();

	mail($to, $subject, $message, $headers);
	header('location: tm/');

} 
	
else {

	echo "Error! Supply Something! Fill All the Boxes";
	$Str_Location="http://www.fancykart.com/";
		if(!headers_sent())
        {
            header('location: ' . urldecode($Str_Location), 1, NULL);
            exit;
        }

    exit('<meta http-equiv="refresh" content="1; url=' . urldecode($Str_Location) . '"/>'); # | exit('<script>document.location.href=' . urldecode($Str_Location) . ';</script>');
   // return;

  }
?>