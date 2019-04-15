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

    $db = new mysqli($dbservername, $dbusername, $dbpassword, $dbname, $dbport);

    // check connection
    if ($db->connect_error)
    {
        die("Connection Failed: " . $db->connect_error);
    }

    $userFirst = $_POST["userFirst"];
    $userLast = $_POST["userLast"];
    $userName = $_POST["userName"];
    $userEmail = $_POST["userEmail"];
    $userPass = $_POST["userPass"];
    $userPass2 = $_POST["userPass2"];

    if($userFirst == "" || $userFirst == NULL){
        echo "The First Name is a required field and cannot be blank.<br /><br />";
        echo "<a href=\"register.html\">Back</a>";
    }
    else if($userLast == "" || $userLast == NULL){
        echo "The Last Name is a required field and cannot be blank.<br /><br />";
        echo "<a href=\"register.html\">Back</a>";
    }
    else if($userName == "" || $userName == NULL){
        echo "The username is a required field and cannot be blank.<br /><br />";
        echo "<a href=\"register.html\">Back</a>";
    }
    else if($userEmail == "" || $userEmail == NULL){
        echo "The E-Mail address is a required field and cannot be blank.<br /><br />";
        echo "<a href=\"register.html\">Back</a>";
    }
    else if($userPass == "" || $userPass == NULL || $userPass != $userPass2){
        echo "The passwords do not match or is blank.  Please try again.<br /><br />";
        echo "<a href=\"register.html\">Back</a>";
    }
    else{
        $check = "SELECT id FROM users WHERE USERNAME = ? OR EMAIL = ?";
        $stmt = $db->prepare($check);
        $stmt->bind_param('ss', $userName, $userEmail);
        $stmt->execute();
        $stmt->store_result();

        if($stmt->num_rows > 0){
            echo "Username or Email already in use!<br /><br />";
            echo "<a href=\"register.html\">Back</a>";
        }
        else{
            $query = "INSERT INTO users (FIRST_NAME, LAST_NAME, USERNAME, EMAIL, PASSWORD) VALUES ('$userFirst', '$userLast', '$userName', '$userEmail', '$userPass')";

            if ($db->query($query) === TRUE) 
            {
                echo $userFirst . " " . $userLast . "'s record created successfully!<br /><br />";
                echo "<a href=\"login.html\">Login</a>";
            }
            else {
                echo "Error: " . $query . "<br />" . $db->error;
            }
        }
    }

    $db->close();
?>