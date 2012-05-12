<?php





// If rating - update the database
if ($_POST['winner'] && $_POST['loser']&&$_POST['pName']) {
	$pName=$_POST['pName'];
	header('location: '.$pName.'');
	include('mysql.php');
include('functions.php');
	//echo $_POST['winner'] . $_POST['loser'];
	// Get the winner
	$result = mysql_query("SELECT * FROM `".$pName."_images` WHERE image_id = ".$_POST['winner']." ");
	$winner = mysql_fetch_object($result);


	// Get the loser
	$result = mysql_query("SELECT * FROM `".$pName."_images` WHERE image_id = ".$_POST['loser']." ");
	$loser = mysql_fetch_object($result);


	// Update the winner score
	$winner_expected = expected($loser->score, $winner->score);
	$winner_new_score = win($winner->score, $winner_expected);
		//test print "Winner: ".$winner->score." - ".$winner_new_score." - " . $winner_expected."<br>";
	mysql_query("UPDATE `".$pName."_images` SET score = " . $winner_new_score.", wins = wins+1 WHERE image_id = " . $_POST['winner']);


	// Update the loser score
	$loser_expected = expected($winner->score, $loser->score);
	$loser_new_score = loss($loser->score, $loser_expected);
		//test print "Loser: ".$loser->score." - ".$loser_new_score." - " . $loser_expected."<br>";
	mysql_query("UPDATE `".$pName."_images` SET score = ".$loser_new_score.", losses = losses+1  WHERE image_id = ".$_POST['loser']);


	// Insert battle
	mysql_query("INSERT INTO `".$pName."_battles` SET winner = ".$_POST['winner'].", loser = ".$_POST['loser']." ");


	// Back to the frontpage
	
	
}


?>