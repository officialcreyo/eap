<?php
        include ('../configs/mysql.php');
        $query = "SELECT t.* FROM (SELECT date, follower FROM stats_twitter ORDER BY date DESC LIMIT 28) t ORDER BY t.date";
        //storing the result of the executed query
        $result = $conn->query($query);
        //loop through the returned data
        $jsonArray = array();
        //check if there is any data returned by the SQL Query
        if ($result->num_rows > 0) {
          //Converting the results into an associative array
          while($row = $result->fetch_assoc()) {
            $jsonArrayItem = array();
            $jsonArrayItem['label'] = $row['date'];
            $jsonArrayItem['value'] = $row['follower'];
            //append the above created object into the main array.
            array_push($jsonArray, $jsonArrayItem);
          }
        }
        //Closing the connection to DB
        $conn->close();
        //set the response content type as JSON
        header('Content-type: application/json');
        //output the return value of json encode using the echo function. 
        echo json_encode($jsonArray);
?>