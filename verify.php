<?php

include('mysql.php');

$queryString = $_SERVER['QUERY_STRING'];

$query = "SELECT * FROM users"; 

$result = mysql_query($query) or die(mysql_error());

while($row = mysql_fetch_array($result)){

	if ($queryString == $row["activationkey"]){

       		echo "Congratulations!" . $row["name"] . " is now the proud  member of fancykart.com . You can now create your own facemash pages of your schoolmates, funnypics etc.";

       		$sql="UPDATE users SET activationkey = '', status='1' WHERE (id = $row[id])";

       		if (!mysql_query($sql))

  		{

        		die('Error: ' . mysql_error());

  		}

    	}
}

?>