<?php

// Mysql settings

$user		= "alayaran_fk";
$password	= "abc123";
$database	= "alayaran_fancykart";
$host		= "localhost";

mysql_connect($host,$user,$password);
mysql_select_db($database) or die( "Unable to select database");

?>