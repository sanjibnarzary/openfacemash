<?php
session_start();
if(isset($_SESSION['email'])){
	
   		echo "Successfully logged out....you are Now redirected to Home Page!";
		//start the session
		
		//set the session parameters
		unset($_SESSION['email']);// = $email;
		unset($_SESSION['hash']);
		
		$Str_Location="http://www.fancykart.com/";
			if(!headers_sent())
        {
            header('location: ' . urldecode($Str_Location), 1, NULL);
            exit;
        }

    exit('<meta http-equiv="refresh" content="3; url=' . urldecode($Str_Location) . '"/>'); # | exit('<script>document.location.href=' . urldecode($Str_Location) . ';</script>');
   // return;
	
}
else{
	$Str_Location="http://www.fancykart.com/";
			if(!headers_sent())
        {
            header('location: ' . urldecode($Str_Location), 1, NULL);
            exit;
        }

    exit('<meta http-equiv="refresh" content="0; url=' . urldecode($Str_Location) . '"/>'); # | exit('<script>document.location.href=' . urldecode($Str_Location) . ';</script>');
   // return;
}
?>