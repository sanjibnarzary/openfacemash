<?php
/*
<!--
        @author: Sanjib Narzary
        @email: o-._.-o@live.com or alayaran@gmail.com
        @profession: M. Tech Student
        @colleges: NIT Silchar, B.Tech and NIT Calicut, M.Tech 2012
        @experienced: None
        @license: GNU/GPL
//-->
*/	
	include('mysql.php');
if(isset($_POST['email']) && isset($_POST['password'])){
	$email = $_POST['email'];
	

   
   // return;
	
	$password = $_POST['password'];

	$sql = 'SELECT `hash` FROM `users` WHERE `email` = "' . mysql_real_escape_string($email) . '" LIMIT 1';
 	
	$r = mysql_fetch_assoc(mysql_query($sql));
	// The first 64 characters of the hash is the salt
	$salt = substr($r['hash'], 0, 64);
 
	$hash = $salt . $password;
 
	// Hash the password as we did before
	for ( $i = 0; $i < 100000; $i ++ )
	{
    		$hash = hash('sha256', $hash);
	}
 
	$hash = $salt . $hash;
 
	if ( $hash == $r['hash'] )
	{
   		echo "logged in congrats";
		//start the session
		session_start();
		//set the session parameters
		$_SESSION['email'] = $email;
		$_SESSION['hash'] = $hash;
		$Str_Location="http://www.fancykart.com/tm/";
		exit('<script>document.location.href="' . urldecode($Str_Location) . '";</script>');
	/*if(!headers_sent())
        {
            header('location: ' . urldecode($Str_Location), 1, NULL);
            exit;
        }*/
		/*exit('<meta http-equiv="refresh" content="2; url=' . urldecode($Str_Location) . '"/>'); |*/ 
		
	/*}
	else{
		echo "Either Password or email not Correct.";
		header('location: ./');
	}*/
	}
}
else{
		echo "Either Password or email not Correct.";
		//header('location: ./');
}
?>