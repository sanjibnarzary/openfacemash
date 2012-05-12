<?php

/*
 *
 * 
 <!--
        @author: Sanjib Narzary
        @email: o-._.-o@live.com or alayaran@gmail.com
        @profession: M. Tech Student
        @colleges: NIT Silchar, B.Tech and NIT Calicut, M.Tech 2012
        @experienced: None
        @license: GNU/GPL
//-->
 * Author: Sanjib Narzary
 * Version 1.1
 * Great resources:
 *
 * 1) http://www.jasonhuber.net/the-social-network-rating-formula-elo/
 * 2) http://www.imdb.com/title/tt1285016/
 * 3) http://en.wikipedia.org/wiki/Mark_Zuckerberg
 * 4) http://www.facebook.com/markzuckerberg
 *
 * Performance rating = [(Total of opponents' ratings + 400 * (Wins - Losses)) / score].
 */

include('mysql.php');
include('functions.php');

if($_GET['id']){
// Get random 2
$pName=$_GET['id'];
$query="SELECT * FROM `".$pName."_images` ORDER BY RAND() LIMIT 0,2";
$result = @mysql_query($query);

while($row = mysql_fetch_object($result)) {
	$images[] = (object) $row;
}
if(count($images)<2){
	header('location: ./tm/editPage.php?id='.$pName);
}
$selectEmail=mysql_query("SELECT email,page_title,page_description,page_keywords FROM pages WHERE page_name='".$pName."'");


	$rows = mysql_fetch_row($selectEmail);
	$emailS= $rows[0];
	$title=$rows[1];
	$description = $rows[2];
	$keywords = $rows[3];
	


$qry=mysql_query("SELECT name FROM users WHERE email='".$emailS."'");

	$rows = mysql_fetch_row($qry);
	$nameS= $rows[0];
	
	


// Get the top10
$result = mysql_query("SELECT *, ROUND(score/(1+(losses/wins))) AS performance FROM `".$pName."_images` ORDER BY ROUND(score/(1+(losses/wins))) DESC LIMIT 0,10");
while($row = mysql_fetch_object($result)) $top_ratings[] = (object) $row;

// Close the connection
mysql_close();

?>


<!DOCTYPE html>
<html><head>
		<title>Beautiful Persons</title>
		<link rel="stylesheet" type="text/css" href="./lib/style.css">
		<link rel="stylesheet" type="text/css" href="./lib/jquery.css">
		
		<script type="text/javascript" src="./lib/jquery_002.js"></script>
		<script type="text/javascript" src="./lib/jquery.js"></script>
                <script type="text/javascript" src="./lib/jquery.gritter.min.js"></script>
                <link rel="stylesheet" type="text/css" href="./lib/jquery.gritter.css" />
		<style>
		.opacity-50 {
			color: rgba(0,0,0,0.5);
			text-align: center;
		}
		</style>
<style type="text/css">

	body, html {
		font-family:Arial, Helvetica, sans-serif;width:100%;margin:0;padding:0;text-align:center;
	}
	h1 {
		background-color:#600;color:#fff;padding:8px 0;margin:0;
	}
	a img {
	border:0;
	}
	td {
		font-size:11px;
	}
	

</style>

		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta property="og:title" content="<?php echo $title ?>"> 
		<meta name="description" content="<?php echo $description ?>">
		<meta name="keywords" content="<?php echo $keywords ?>">
		<meta property="og:type" content="website"> 
		<meta property="og:url" content="./pageView.php?id=<?php echo $pName ?>"> 
	<script>
			$(document).keydown(function(e) {
				if (e.keyCode == 13) {
					e.preDefault();
				}
				if (e.keyCode == 37)
				{
					$('input[name=1]').click();
				}
				if (e.keyCode == 39)
				{
					$('input[name=2]').click();
				}
				if (e.keyCode == 38)
				{
					 location.reload();
				}

			});
		</script>
			</head>
	<body>
			<div id="container">
			<div id="header">
				<a href="./<?php echo ''.$pName; ?>" id="logo"><?php echo $title ?></a>
			</div>
			<div id="navigation">
				<a href="./<?php echo ''.$pName; ?>">Vote</a>
				<a href="./<?php echo ''.$pName; ?>#top-rankers">Top 10</a>
				<a href="about">Info</a>
			</div>
			<div class="clear"></div>
			<div id="content"><p style="margin-top:-50px;"></p><center>	
<!-- 
 * Author: Sanjib Narzary
 * Version 1.1
 * Great resources:
 //-->
<script type="text/javascript">
	$(function(){
		$('.holder').hover(function(){
			$(this).children('input').show();
		}, function(){
			$(this).children('input').hide();
		});
             
	});
        

</script>
<form action="./rate" method="post">
	<input name="winner" value="<?php echo $images[0]->image_id ?>" type="hidden">
	<input name="loser" value="<?php echo $images[1]->image_id ?>" type="hidden">
	<div class="half">
		<div class="holder" style="float: right; width=400px;">
			<img src="./uploads/<?php echo $pName."/".$images[0]->filename ?> "  height='400' />
			<input style="display: none;" name="1" value="Vote" type="submit">
			<input type="hidden" name="pName" value="<?php echo $_GET['id'] ?>">
			<div class="opacity-50">Image 1</div>
		</div>
	</div>
</form>
<form action="./rate" method="post">
	<input name="winner" value="<?php echo $images[1]->image_id ?>" type="hidden">
	<input name="loser" value="<?php echo $images[0]->image_id ?>" type="hidden">
	<div class="half">
		<div class="holder" style="float: left; width:400px;">
			<img src="./uploads/<?php echo $pName."/".$images[1]->filename ?> "  height='400' />
			<input style="display: none;" name="2" value="Vote" type="submit">
			<input type="hidden" name="pName" value="<?php echo $_GET['id'] ?>">
			<div class="opacity-50">Image 2</div>
		</div>	
	</div><div>
<h2>Top Rated</h2>
</div>
</form>			</center></div>
		</div>	


<center>
<p id="top-rankers">
<table>
	<tr>
		<?php $rank=1; foreach($top_ratings as $key => $image) : ?>
		<td valign="top"><img src="./uploads/<?php echo $pName."/".$image->filename ?>" width="70" /></td>
		<?php endforeach ?>
	</tr>
	<tr>
		<?php $rank=1; foreach($top_ratings as $key => $image) : ?>
		<td valign="top"><?php echo "<h1>Top #".$rank++ ?></h1></td>		
		<?php endforeach ?>
	</tr>
	<tr>
		<?php foreach($top_ratings as $key => $image) : ?>
		<td valign="top">Score: <?php echo $image->score?></td>
		<?php endforeach ?>
	</tr>
	<tr>
		<?php foreach($top_ratings as $key => $image) : ?>
		<td valign="top">Performance: <?php echo $image->performance?></td>
		<?php endforeach ?>
	</tr>
	<tr>
		<?php foreach($top_ratings as $key => $image) : ?>
		<td valign="top">Won: <?php echo $image->wins?></td>
		<?php endforeach ?>
	</tr>
	<tr>
		<?php foreach($top_ratings as $key => $image) : ?>
		<td valign="top">Lost: <?php echo $image->losses?></td>
		<?php endforeach ?>
	</tr>

</table>
</p>

<p><br />
Created by <a href="#" style="text-decoration:none;"><?php echo $nameS ?></a>. <br/><br/>Website Maintained and Developed By <a href="http://www.twitter.com/SanjibNarzary" style="text-decoration:none;">Sanjib Narzary</a> with MySQL, PHP, JQuery, CSS. Copyright &copy; 2012. You can create your own at <a href=".">www.fancykart.com</a>
</p>
</center>
	
</body></html>
<?php
}
else{
echo "Error!";
}
?>