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
$data = array( "email" => "", "password" => "" );

if( isset( $_POST["email"] ) ) {
	if( $_POST["email"] != "" && !preg_match( "/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $_POST["email"] ) ) {
		$data["email"] = "notvalid";
	}
}

if( isset($_POST["password"])){
	if(strlen($_POST["password"]) < 4 ){
		$data["password"] = "shortpass";
	}
}

if( isset($_POST["password"]) && isset($_POST["password_again"]) ) {
	if( $_POST["password_again"] != "" && $_POST["password"] != $_POST["password_again"] ) {
		$data["password"] = "missmatch";
	}
}


if( isset($_POST["name"])){
	if($_POST["name"]==" "){
		$data["name"] = "blankname";	
	}
}


echo json_encode( $data );
?>