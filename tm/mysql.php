<?php

// Mysql settings
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
$user		= "sanjibnarzary";
$password	= "abc123";
$database	= "openfacemash";
$host		= "localhost";

mysql_connect($host,$user,$password);
mysql_select_db($database) or die( "Unable to select database");

?>