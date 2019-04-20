<?php
    require_once('myfuncs.php');

    $userName = $_POST["userName"];
    $userPass = $_POST["userPass"];

    if($userName == "" || $userName == NULL){
        echo "Username is required";
    }
    else if($userPass == "" || $userPass == NULL){
        echo "User Password is required";
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
            echo "Login Failed, no user found or password incorrect";
        }
        else if ($stmt->num_rows > 1){
            echo "Login Failed, Multiple usernames found. Contact the site admin.";
        }
        else{
            echo "Login Successful!";
        }

        $db->close();

    }


?>