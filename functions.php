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
// Calculate the expected % outcome
function expected($Rb, $Ra) {
	return 1/(1 + pow(10, ($Rb-$Ra)/400));
}

// Calculate the new winnner score
function win($score, $expected, $k = 24) {
	return $score + $k * (1-$expected);
}

// Calculate the new loser score
function loss($score, $expected, $k = 24) {
	return $score + $k * (0-$expected);
}

?>