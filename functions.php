<?php

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