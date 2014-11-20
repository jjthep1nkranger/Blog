<?php
    require_once (__DIR__ . "/../model/database.php");
    //links to the create db page for information
    $connection = new mysqli($host, $username, $password);
    //makes variable for connection 
    if($connection->connect_error) {
        die("Error: " . $connection->connect_error);
    }
    else {
        echo "success" . $connection->host_info;
    }
    //if statments that check in the database and replies if a 
    //connnection is made
    $connection->close();
    //closes the connection to the database