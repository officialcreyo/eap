#!/usr/bin/php
<?php
    include ('../configs/mysql.php');
    include ('../functions/twitter-include.php');

    $today = date('Y-m-d');
    $timestamp = date('H:i');

    $query = mysqli_query($conn, "SELECT * FROM stats_twitter WHERE date='$today'");

    if (!$query)
    {
        die('Error: ' . mysqli_error($conn));
    }

    if(mysqli_num_rows($query) > 0){

        $sql = "UPDATE stats_twitter SET follower='$followers', tweets='$statuses1', timestamp='$timestamp', friends='$friends', likes='$likes' WHERE date='$today'";

        if ($conn->query($sql) === TRUE) {
            echo "";
        } else {
            echo "Error updating record: " . $conn->error;
        }

    } else {

        $sql = "INSERT INTO stats_twitter (date, follower, tweets, timestamp, friends, likes) VALUES ('$date', '$followers', '$statuses1', '$timestamp', '$friends', '$likes')";

        if ($conn->query($sql) === TRUE) {
            echo "";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

?>