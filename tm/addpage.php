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

// we check if everything is filled in

if(isset($_POST['pname']) || isset($_POST['ptitle']) || isset($_POST['pdescription']) || isset($_POST['pkeywords'])){
	
	$page_name = $_POST['pname'];
	$page_title = $_POST['ptitle'];
	$page_description = $_POST['pdescription'];
	$page_keywords = $_POST['pkeywords'];
	header('location: ./editPage.php?id='.$page_name);
	include('mysql.php');
	//get session variable
	session_start();
	if(isset($_SESSION['email'])){
		$email = $_SESSION['email'];
	}
	else
		die(msg(0,"Session expired..Please login again"));;
	
	if(empty($page_name) || empty($page_title) || empty($page_description) || empty($page_keywords))
	{
		die(msg(0,"All the fields are required"));
	}


	if(strlen($page_name)>3 && strlen($page_name)< 64){
	
		if(!preg_match("/^[a-zA-Z0-9]+\-?[a-zA-Z0-9]+$/i", $page_name)){
			die(msg(0,"Page name should not contain special characters."));
		}
		else{
			//CHECK IF PAGE IS ALREADY CREATED OR NOT 
			$check_page_exist = "SELECT * FROM `pages` WHERE `page_name` = '" . $page_name . "'";
			$chk = mysql_fetch_assoc(mysql_query($check_page_exist));
			if($chk == true)
				echo msg(0,"Error: A page with ".$page_name." already exists..!");
			else{
				//insert and create folder if page name not exist
				
				
			//create a pagename
			$structure = '../uploads/'.$page_name;

			// To create the nested structure, the $recursive parameter 
			// to mkdir() must be specified.
			if(!mkdir($structure, 0777,true)){
				die("Unable to Create Directory");
			}else{
			
				$pinsert = "INSERT INTO pages (`page_name`,`page_title`,`page_description`,`page_keywords`,`email`) VALUES ('".$page_name."','".$page_title."','".$page_description."','".$page_keywords."','".$email."')";
				if (!mysql_query($pinsert)) {
					echo msg(0, mysql_error());
				}
				else {
					//call function of create own table
					echo msg(1,"page-created.html");
					$page_battle="CREATE TABLE IF NOT EXISTS `".$page_name."_battles` (
							`battle_id` bigint(20) unsigned NOT NULL auto_increment,
							`winner` bigint(20) unsigned NOT NULL,
							`loser` bigint(20) unsigned NOT NULL,
							PRIMARY KEY  (`battle_id`),
							KEY `winner` (`winner`)
						) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ";
					$page_image="CREATE TABLE IF NOT EXISTS `".$page_name."_images` (
			`image_id` bigint(20) unsigned NOT NULL auto_increment,
			`filename` varchar(255) NOT NULL,
			`score` int(10) unsigned NOT NULL default '1500',
			`wins` int(10) unsigned NOT NULL default '0',
			`losses` int(10) unsigned NOT NULL default '0',
			PRIMARY KEY  (`image_id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";
			mysql_query($page_battle);
			mysql_query($page_image);
			mysql_close();
			
		}
		}
				
				
			
			}
			
		}
		
	}

	else{
		die(msg(0,"Page Name should be in between 4-60 characters long"));
	}	


}



// Here you must put your code for validating and escaping all the input data,
// inserting new records in your DB and echo-ing a message of the type:

// echo msg(1,"/member-area.php");

// where member-area.php is the address on your site where registered users are
// redirected after registration.







function msg($status,$txt)
{
	return '{"status":'.$status.',"txt":"'.$txt.'"}';
}
?>
