<?php
    $dbservername = "localhost";
    $dbusername = "cst126_blog";
    $dbpassword = "cst126_blog";
    $dbname = "cst126_blog";
    $dbport = "3306";
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
        // Create the connection to the database
        $db = new mysqli($dbservername, $dbusername, $dbpassword, $dbname, $dbport);

        // check connection
        if ($db->connect_error)
        {
            die("Connection Failed: " . $db->connect_error);
        }

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

        $result->free();
        $db->close();

    }


?>