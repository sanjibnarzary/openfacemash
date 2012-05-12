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
$usernames = array( "martynj", "admin", "bob", "dave", "fred" );
$data = array( "email" => "");

if( isset( $_POST["email"] ) ) {
	if( $_POST["email"] != "" && !preg_match( "/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $_POST["email"] ) ) {
		$data["email"] = "notvalid";
	}
}


echo json_encode( $data );
?>