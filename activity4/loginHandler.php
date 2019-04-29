<?php
    // CST-126 Blog Project 2.0
    // Module: Login Handler  Version: 1.4
    // Jackie Adair
    // 25 April 2019
    // Handler methods for login page

    require_once('myfuncs.php');
    require_once('utility.php');

    $userName = $_POST["userName"];
    $userPass = $_POST["userPass"];

    if($userName == "" || $userName == NULL){
        $message = "Username is required.<br /><br />
            <a href=\"login.php\">Back</a>";
        require_once("header.php");
        include('messenger.php');
        require_once("footer.php");
    }
    else if($userPass == "" || $userPass == NULL){
        $message = "User Password is required.<br /><br />
            <a href=\"login.php\">Back</a>";
        require_once("header.php");
        include('messenger.php');
        require_once("footer.php");
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
            require_once("header.php");
            include('messenger.php');
            require_once("footer.php");
        }
        else if ($stmt->num_rows > 1){
            $message =  "Login Failed, Multiple duplicate usernames found. Contact the site admin.<br /><br />
                <a href=\"login.php\">Back</a>";
            require_once("header.php");
            include('messenger.php');
            require_once("footer.php");
            
        }
        else{
            $stmt->fetch();
            saveUser($ID, $userName);

            $users = getAllUsers();
            $message = "Login Sucess!<br /><br />";
            require_once("header.php");
            include('messenger.php');
            include('_displayUsers.php');
            require_once("footer.php");
        }

        $db->close();

    }

?>