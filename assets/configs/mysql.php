<?php

  $host = "insert_here";
  $user = "insert_here";
  $pass = "insert_here";
  $dbname = "insert_here";

	$conn = new mysqli($host, $user, $pass, $dbname);

	if(!$conn){
		die("Fatal Error: Connection Faileds");
	}
?>
