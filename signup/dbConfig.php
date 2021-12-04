<?php

    $server_address = "localhost";              	//If you connecting remotely to this database you need to set the hostname of your server and you need to allow access to your ip from server 
    $database_name = "robulab1_register";   	    //Set your database name
    $username = "robulab1_robulab1";		    //Set your database username
    $password = "Robu@2021";		    //Set database password
    
  
    // Create connection
    $db = new mysqli($server_address, $username, $password, $database_name);
?>