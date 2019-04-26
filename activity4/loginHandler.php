<?php
    // CST-126 Blog Project 2.0
    // Module: Login Handler  Version: 1.4
    // Jackie Adair
    // 25 April 2019
    // Handler methods for login page

    require_once('myfuncs.php');

    $userName = $_POST["userName"];
    $userPass = $_POST["userPass"];

    if($userName == "" || $userName == NULL){
        $message = "Username is required.<br /><br />
            <a href=\"login.php\">Back</a>";
        include('messenger.php');
    }
    else if($userPass == "" || $userPass == NULL){
        $message = "User Password is required.<br /><br />
            <a href=\"login.php\">Back</a>";
        include('messenger.php');
    }
    else{
        $db = dbConnect();

        $query = "SELECT ID FROM users WHERE USERNAME = ? AND PASSWORD = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param('ss', $userName, $userPass);

        $stmt->execute();

        $stmt->store_result();
        $stmt->bind_result($ID);

        if($stmt->num_rows < 1){
            $message = "Login Failed, no user found or password incorrect.<br /><br />
                <a href=\"login.php\">Back</a>";
            include('messenger.php');
        }
        else if ($stmt->num_rows > 1){
            $message =  "Login Failed, Multiple duplicate usernames found. Contact the site admin.<br /><br />
                <a href=\"login.php\">Back</a>";
            include('messenger.php');
            
        }
        else{
            $stmt->fetch();
            saveUser($ID, $userName);

            $message =  "Login Sucess!<br /><br />";
            include('messenger.php');
        }

        $db->close();

    }


?>