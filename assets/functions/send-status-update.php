<?php

include ('Twitter.php');

$consumerKey = "IvNMGt8s6p0gWmQxadwZEMt2W";
$consumerSecret = "YKHbGta8epXgCit4Lb3K5DEKobBsEgBqiRPbEeEAdz3CUCx6v0";
$accessToken = "2677714412-EG8QOAQvbm7T1txiCGZPrDwmbMOHD0mgOpivCD7";
$accessTokenSecret = "dTfxRjXoe19Fen9iKGTPQbDWloui12QPDhQsZmCtK7tV6";

$twitter = new Twitter($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);

$twitter->sendDirectMessage('niklasschmdt', 'Testnachricht');

?>