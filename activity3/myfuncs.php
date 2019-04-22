<?php
    
    function dbConnect(){
        $dbservername = "localhost";
        $dbusername = "activity1";
        $dbpassword = "activity1";
        $dbname = "activity1";
        $dbport = "3306";

        $db = new mysqli($dbservername, $dbusername, $dbpassword, $dbname, $dbport);

        if ($db->connect_error)
        {
            die("Connection Failed: " . $db->connect_error);
        }

        return $db;
    }

    function saveUserId($id){
        session_start();
        $_SESSION["USER_ID"] = $id;
    }

    function getUserId(){
        session_start();
        return $_SESSION["USER_ID"];
    }
?>