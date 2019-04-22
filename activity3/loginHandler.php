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
        $message = "Username is required.<br /><br />
            <a href=\"login.html\">Back</a>";
        include('loginFailed.php');
    }
    else if($userPass == "" || $userPass == NULL){
        $message = "User Password is required.<br /><br />
            <a href=\"login.html\">Back</a>";
        include('loginFailed.php');
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
            $message = "Login Failed, no user found or password incorrect.<br /><br />
                <a href=\"login.html\">Back</a>";
            include('loginFailed.php');
        }
        else if ($stmt->num_rows > 1){
            $message =  "Login Failed, Multiple usernames found. Contact the site admin.<br /><br />
                <a href=\"login.html\">Back</a>";
            include('loginFailed.php');
            
        }
        else{
            include('loginResponse.php');
            echo "<a href=\"index.html\">Home</a>";
        }

        $db->close();

    }


?>