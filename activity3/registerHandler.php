<?php
    require_once('myfuncs.php');

    $db = dbConnect();

    $userFirst = $_POST["userFirst"];
    $userLast = $_POST["userLast"];
    $userName = $_POST["userName"];
    $userPass = $_POST["userPass"];

    if($userFirst == "" || $userFirst == NULL){
        echo "The First Name is a required field and cannot be blank.";
    }
    else if($userLast == "" || $userLast == NULL){
        echo "The Last Name is a required field and cannot be blank.";
    }
    else if($userName == "" || $userName == NULL){
        echo "The username is a required field and cannot be blank.";
    }
    else if($userPass == "" || $userPass == NULL){
        echo "The Password is a required field and cannot be blank.";
    }
    else{
        $query = "INSERT INTO users (FIRST_NAME, LAST_NAME, USERNAME, PASSWORD) VALUES ('$userFirst', '$userLast', '$userName', '$userPass')";

        if ($db->query($query) === TRUE) 
        {
            echo $userFirst . " " . $userLast . "'s record created successfully";
        }
        else {
            echo "Error: " . $query . "<br />" . $db->error;
        }
    }

    $db->close();
?>