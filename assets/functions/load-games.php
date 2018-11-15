<?php
    $gameid = $row['game'];

    $gamequery = "SELECT * FROM games WHERE id='$gameid'";
    
    $gameresult = mysqli_query($conn, $gamequery);
    $gamerow = mysqli_fetch_assoc($gameresult);

    $game = $gamerow["name"];

?>