<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--
        @author: Sanjib Narzary
        @email: o-._.-o@live.com or alayaran@gmail.com
        @profession: M. Tech Student
        @colleges: NIT Silchar, B.Tech and NIT Calicut, M.Tech 2012
        @experienced: None
        @license: GNU/GPL
//-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FancyKart Admin</title>

<!-- CSS -->
<link href="style/css/transdmin.css" rel="stylesheet" type="text/css" media="screen" />
<!--[if IE 6]><link rel="stylesheet" type="text/css" media="screen" href="style/css/ie6.css" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" type="text/css" media="screen" href="style/css/ie7.css" /><![endif]-->

<!-- JavaScripts-->
<script type="text/javascript" src="style/js/jquery.js"></script>
<script type="text/javascript" src="style/js/jNice.js"></script>
</head>

<body>
	<div id="wrapper">
    	<!-- h1 tag stays for the logo, you can use the a tag for linking the index page -->
    	<h1><a href="#"><span>Admin</span></a></h1>
        
        <!-- You can name the links with lowercase, they will be transformed to uppercase by CSS, we prefered to name them with uppercase to have the same effect with disabled stylesheet -->
        <ul id="mainNav">
        	<li><a href="#" class="active">DASHBOARD</a></li> <!-- Use the "active" class for the active menu item  -->
        	<li><a href="#">ADMINISTRATION</a></li>
        	<li><a href="#">DESIGN</a></li>
        	<li><a href="#">OPTION</a></li>
        	<li class="logout"><a href="logout.php">LOGOUT</a></li>
        </ul>
        <!-- // #end mainNav -->
        
        <div id="containerHolder">
			<div id="container">
        		<div id="sidebar">
                	<ul class="sideNav">
                    	<li><a href="createPage.php">Create Page</a></li>
                    	<li><a href="index.php" class="active">Facemash Pages</a></li>
                    	<li><a href="#">Training &amp; Support</a></li>
                    	<li><a href="#">Books</a></li>
                    	<li><a href="#">Safari books online</a></li>
                    	<li><a href="#">Events</a></li>
                    </ul>
                    <!-- // .sideNav -->
                </div>    
                <!-- // #sidebar -->
                
                <!-- h2 stays for breadcrumbs -->
                <h2><a href="#">Dashboard</a> &raquo; <a href="#" class="active">Facemash Pages</a></h2>
                
                <div id="main">
                	
					
					
<?php
	include('mysql.php');
// we check if everything is filled in
//get session variable
	session_start();
	if(isset($_SESSION['email'])){
		$email = $_SESSION['email'];
	}
	else{
		echo "Session expired..Please login again";
		header('Location: ../index.php');
		}
	//get page name from url
	if($_GET['id']){
		$pName=$_GET['id'];
	}	
	$check_pages = "SELECT * FROM `pages` WHERE `email` = '" . $email . "' AND `page_name` = '" . $pName . "'";
	$chk = mysql_fetch_assoc(mysql_query($check_pages));
	if($chk == true){
				$result = mysql_query($check_pages);
				
				while($row = mysql_fetch_array($result))
				{
					echo "";
					echo " <p><h3>" . $row['page_title']." <a href='../".$pName."' target='_blank'>View Page</a></h3></p>";					
					echo "<br>";				
				}
				echo '<form class="jNice" action="fileUpload.php" method="post" enctype="multipart/form-data">';
				echo '<fieldset><p><label for="file">Upload Images:</label></p>';
				echo '<p><input type="file" name="file" id="file" size="55"/></p>';
				echo '<input type="hidden" name="id" id="id" value="'.$pName.'"/></p>';
				echo '<p><input style="float:left;" type="submit" name="submit" value="Upload" /></p></fieldset>';
				echo '</form>';
				
				echo '<h3>Uploaded Images<h3><fieldset>';
				$qry = "SELECT * FROM `".$pName."_images` ORDER BY `image_id` DESC";
				$chkq = mysql_fetch_assoc(mysql_query($qry));
				if($chkq == true){
					$result = mysql_query($qry);
					while($row = mysql_fetch_array($result))
				{
					echo "";
					echo " <p><img src='../uploads/".$pName."/" . $row['filename']."' height='250' width='300'/></p>";					
					echo "";				
				}
				}
				echo '</fieldset>';
	}
	else{
		echo "Create Page";
	}
	
?>
                    	                      
                     
						
                </div>
                <!-- // #main -->
                
                <div class="clear"></div>
            </div>
            <!-- // #container -->
        </div>	
        <!-- // #containerHolder -->
        
        <p id="footer">Created by <a href="http://www.facebook.com/SanjibNarzary" style="text-decoration:none;">Sanjib Narzary.</a> Copyright &copy; 2012</p>
    </div>
    <!-- // #wrapper -->
</body>
</html>
