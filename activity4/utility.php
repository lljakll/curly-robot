<?php
    // CST-126 Blog Project 2.0
    // Module: Utilities  Version: 1.0
    // Jackie Adair
    // 28 April 2019
    // Utility Functions

    function getAllUsers(){

        require_once("myfuncs.php");
        $db = dbConnect();

        $query = "SELECT id, FIRST_NAME, LAST_NAME FROM users";

        $users = array();
        $index = 0;

        $stmt = $db->prepare($query);
        $stmt->bind_result($id, $first, $last);
        $stmt->execute();
    
        $stmt->store_result();
    
        while($stmt->fetch()){
            $users[$index] = array($id, $first, $last);
            ++$index;  
        }
    
        $db->close();
        return $users;
    }

?>