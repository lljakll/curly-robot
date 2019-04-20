<?php

    /*
    CST-126 Activity 3
    Module - Reg Page v3.0
    Jackie Adair
    20 April 2019
    PHP for the registration page for this blog.
    */

    require_once('myfuncs.php');

    $userName = $_POST["userName"];
    $userPass = $_POST["userPass"];

    if($userName == "" || $userName == NULL){
        echo "Username is required.<br /><br />";
        echo "<a href=\"login.html\">Back</a>";
    }
    else if($userPass == "" || $userPass == NULL){
        echo "User Password is required.<br /><br />";
        echo "<a href=\"login.html\">Back</a>";
    }
    else{
        $db = dbConnect();

        $query = "SELECT id FROM users WHERE USERNAME = ? AND PASSWORD = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param('ss', $userName, $userPass);
//        $stmt->bind_results($id);
        $stmt->execute();

        $stmt->store_result();

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

        $db->close();

    }


?>