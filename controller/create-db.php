<?php
    require_once (__DIR__ . "/../model/database.php");//links to the create db page for information
    $connection = new mysqli($host, $username, $password);//makes variable for connection 
    if($connection->connect_error) { //if statments that check in the database and replies if a
        die("<p>Error: " . $connection->connect_error . "</p>");
    }
   
    
    $exists = $connection->select_db($database);
    
    if (!$exists) {//checks if the database exists
         $query = $connection->query("CREATE DATABASE $database");//the command that creates a database
         if($query){
             echo "<p>Succesfully created database: " . $database . "</p>";//tells us when the database is created sucsesfully
         }
    }
    else {
        echo "<p>Database already exsists.</p>";//tells us that the database is already created
    }
    
    $query = $connection->query("CREATE TABLE posts ("//creates the table for the blog posts
            . "id int(11) NOT NULL AUTO_INCREMENT,"//sets id of the posts
            . "title varchar(255) NOT NULL,"//creates column for title of the post
            . "post text NOT NULL,"//sets column for the posts
            . "PRIMARY KEY (id))");//sets primary key for the table
    
    if($query) {
        echo "<p>Succesfully created table: posts</p>";//checks if the table was created
    }
    else {
        echo "<p>$connection->error</p>";//tells us if the table already exists
    }
    $connection->close();//closes the connection to the database