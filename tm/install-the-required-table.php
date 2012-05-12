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

	$query = "CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL auto_increment,
  `status` bool DEFAULT 0,
  `name` varchar(50) NOT NULL,
  `hash` varchar(256) NOT NULL,
  `email` varchar(255) NOT NULL,
  `activationkey` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `activationkey` (`activationkey`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ";

if(!mysql_query($query)){
	die(mysql_error());
}
else{
	echo "Users Table Created";
}
	$query1="CREATE TABLE IF NOT EXISTS `pages` (
			`page_id` bigint(20) unsigned NOT NULL auto_increment,
			`page_name` varchar(64) NOT NULL,
			`image_name` varchar(255),
			`page_title` varchar(255) NOT NULL,
			`page_description` varchar(255) NOT NULL,
			`page_keywords` varchar(512) NOT NULL,
			`email` varchar(256) NOT NULL,
			`score` int(10) unsigned NOT NULL default '1500',
			`wins` int(10) unsigned NOT NULL default '0',
			`losses` int(10) unsigned NOT NULL default '0',
			PRIMARY KEY  (`page_id`),
			UNIQUE KEY `page_name` (`page_name`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";
if(!mysql_query($query1)){
	die(mysql_error());
}
else{
	echo "Users Table Created";
}
$query2="CREATE TABLE IF NOT EXISTS `pages_battles` (
					`battle_id` bigint(20) unsigned NOT NULL auto_increment,
					`winner` bigint(20) unsigned NOT NULL,
					`loser` bigint(20) unsigned NOT NULL,
					PRIMARY KEY  (`battle_id`),
					KEY `winner` (`winner`)
				) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";
if(!mysql_query($query2)){
	die(mysql_error());
}
else{
	echo "Users Table Created";
}
?>