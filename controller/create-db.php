<?php
    require_once (__DIR__ . "/../model/database.php");
    //links to the create db page for information
    $connection = new mysqli($host, $username, $password);
    //makes variable for connection 
    if($connection->connect_error) {
        die("Error: " . $connection->connect_error);
    }
    //if statments that check in the database and replies if a
    
    $exists = $connection->select_db($database);
    
    if (!$exists) {
        //checks if the database exists
         $query = $connection->query("CREATE DATABASE $database");
         //the command that creates a database
         if($query){
             echo "Succesfully created database: " . $database;
             //tells us when the database is created sucsesfully
         }
    }
    else {
        echo "Database already exsists.";
        //tells us that the database is already created
    }
    $connection->close();
    //closes the connection to the database