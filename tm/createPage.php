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
		header('location: ../');
		}
		?>
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
                    	<li><a href="createPage.php" class="active">Create Page</a></li>
                    	<li><a href="index.php">Facemash Pages</a></li>
                    	<li><a href="#">Training &amp; Support</a></li>
                    	<li><a href="#">Books</a></li>
                    	<li><a href="#">Safari books online</a></li>
                    	<li><a href="#">Events</a></li>
                    </ul>
                    <!-- // .sideNav -->
                </div>    
                <!-- // #sidebar -->
                
                <!-- h2 stays for breadcrumbs -->
                <h2><a href="#">Dashboard</a> &raquo; <a href="#" class="active">Create Page</a></h2>
                
                <div id="main">
                	
					
						<form id="regForm" action="addpage.php" method="post" class="jNice">
						<h3>Create Facemash Page</h3>
<fieldset>
<p>
<label for="pname">Page Name:</label>
	<div class="input-container"><input name="pname" id="pname" type="text" class="text-long" value="example: beautyfulpersons" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/></div>
</p><p>
  <label for="ptitle">Page Title:</label>
    <div class="input-container"><input name="ptitle" id="ptitle" type="text" class="text-long" value="Rate Most Beautiful Persons" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/></div>
 </p>
 <p>
  <label for="pdescription">Page Description:</label>
	<div class="input-container"><textarea name="pdescription" id="pdescription" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;">Most Beautiful persons of Kozhikode</textarea></div>

</p><p>	<label for="pkeywords">Page Keywords:</label>
	<div class="input-container"><textarea name="pkeywords" id="pkeywords" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;">facemash,fancykart,beautiful,persons</textarea></div>
  </p><p>
  <input type="submit" class="greenButton" value="Create Facemash Page" /><img id="loading" src="img/ajax-loader.gif" alt="" />
</p>
</fieldset>
</form>
						
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
