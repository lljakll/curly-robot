<?php
    // CST-126 Blog Project 2.0
    // Module: Utilities  Version: 1.0
    // Jackie Adair
    // 7 July 2019
    // Utility Functions

    function getAllUsers(){

        // require the myfuncs module
    
        require_once("myfuncs.php");
        // connect to the db
        $db = dbConnect();
        // query to run
        $query = "SELECT id, FIRST_NAME, LAST_NAME FROM users";
        // array of users
        $users = array();
        $index = 0;

        // get the users
        $stmt = $db->prepare($query);
        $stmt->bind_result($id, $first, $last);
        $stmt->execute();
    
        $stmt->store_result();
        // loop thorough the retrieved users and store them in the array
        while($stmt->fetch()){
            $users[$index] = array($id, $first, $last);
            ++$index;  
        }
    
        $db->close();
        // return the users array
        return $users;
    }

?>