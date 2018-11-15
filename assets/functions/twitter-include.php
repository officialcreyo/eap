<?php

/*
* Requires the "Twitter API" wrapper by James Mallison
* to be found at https://github.com/J7mbo/twitter-api-php
*
* The way how to get a follower count was posted by Amal Murali
* on http://stackoverflow.com/questions/17409227/follower-count-number-in-twitter
*/

require_once('api-twitter.php');              // adjust server path accordingly
include('../configs/tokens.php');

// GET YOUR TOKENS AND KEYS at https://dev.twitter.com/apps/
$settings = array(
'oauth_access_token' => $acctok,                // enter your data here
'oauth_access_token_secret' => $acctoksec,     // enter your data here
'consumer_key' => $conkey,                  // enter your data here
'consumer_secret' => $conseckey                // enter your data here
);

$ta_url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
$getfield = '?screen_name=' . $tname;
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
$follow_count=$twitter->setGetfield($getfield)
->buildOauth($ta_url, $requestMethod)
->performRequest();

$data = json_decode($follow_count, true);

foreach($data as $tweets) { // we run through the array

$followers = $tweets['user']['followers_count'];
$friends = $tweets['user']['friends_count'];
$likes = $tweets['user']['favourites_count'];
$statuses1 = $tweets['user']['statuses_count'];

} // end of loop

?>
