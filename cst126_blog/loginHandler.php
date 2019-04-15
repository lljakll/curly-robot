<?php

    /*
    CST-126 Blog Project 1.0
    Module - Registration Page v2.0
    Jackie Adair
    14 April 2019
    PHP for the registration page for this blog.
    */

    $dbservername = "localhost";
    $dbusername = "cst126_blog";
    $dbpassword = "cst126_blog";
    $dbname = "cst126_blog";
    $dbport = "3306";
    $userName = $_POST["userName"];
    $userPass = $_POST["userPass"];

    
    if($userName == "" || $userName == NULL){
        // Check for a submitted username
        echo "Username is required.<br /><br />";
        echo "<a href=\"login.html\">Back</a>";
    }
    else if($userPass == "" || $userPass == NULL){
        // Check for a submitted password
        echo "User Password is required.<br /><br />";
        echo "<a href=\"login.html\">Back</a>";
    }
    else{
        // Create the connection to the database
        $db = new mysqli($dbservername, $dbusername, $dbpassword, $dbname, $dbport);

        // check connection
        if ($db->connect_error)
        {
            die("Connection Failed: " . $db->connect_error);
        }

        // Check db for matching username and password
        $query = "SELECT id FROM users WHERE USERNAME = ? AND PASSWORD = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param('ss', $userName, $userPass);
        $stmt->execute();

        $stmt->store_result();

        // check if a row was returned.  if less than 1 then fail, more than 1, error, exactly
        // 1, successful login
        if($stmt->num_rows < 1){
            echo "Login Failed, no user found or password incorrect.<br /><br />";
            echo "<a href=\"login.html\">Back</a>";
        }
        else if ($stmt->num_rows > 1){
            echo "Login Failed, Multiple usernames found. Contact the site admin.<br /><br />";
            echo "<a href=\"login.html\">Back</a>";
        }
        else{
            echo "Login Successful!<br /><br />";
            echo "<a href=\"index.html\">Home</a>";
        }

        // release result var and close the database
        $result->free();
        $db->close();

    }


?>