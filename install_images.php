<?php

include('mysql.php');

if ($handle = opendir('images')) {

	/* This is the correct way to loop over the directory. */
	while (false !== ($file = readdir($handle))) {
		if($file!='.' && $file!='..') {
			$images[] = "('".$file."')";
		}
	}

	closedir($handle);
}

$query = "INSERT INTO images (filename) VALUES ".implode(',', $images)." ";
if (!mysql_query($query)) {
	print mysql_error();
}
else {
	print "finished installing your images!";
}


?>