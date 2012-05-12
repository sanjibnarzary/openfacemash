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
// we check if everything is filled in
//get session variable
	session_start();
	if(isset($_SESSION['email'])){
		$email = $_SESSION['email'];
	}
	else
		echo "Session expired..Please login again";
		
	$check_pages = "SELECT * FROM `pages` WHERE `email` = '" . $email . "'";
	$chk = mysql_fetch_assoc(mysql_query($check_pages));
	if($chk == true){
				$result = mysql_query("SELECT * FROM pages WHERE email = '".$email."'");
				while($row = mysql_fetch_array($result))
				{
					echo $row['page_name'] . " " . $row['page_title'];
					echo "<br />";
					}
	}
	else{
		echo "Create Page";
	}
?>