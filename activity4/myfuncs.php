<?php
    // CST-126 Blog Project 1.0
    // Module: Functions  Version: 1.2
    // Jackie Adair
    // 25 April 2019
    // General Site Functions

    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
    
    function dbConnect(){
        $dbservername = "jackies-cst126-mysql-server.mysql.database.azure.com";
        $dbusername = "cst126_blog";
        $dbpassword = "cst126_blog";
        $dbname = "cst126_blog";
        $dbport = "3306";

        $db = new mysqli($dbservername, $dbusername, $dbpassword, $dbname, $dbport);

        if ($db->connect_error)
        {
            die("Connection Failed: " . $db->connect_error);
        }

        return $db;
    }

    function saveUser($id, $userName){

        $_SESSION["USER_ID"] = $id;
        $_SESSION["USER_NAME"] = $userName;
    }

    function clearUser(){

        $_SESSION["USER_ID"] = NULL;
        $_SESSION["USER_NAME"] = NULL;
    }

    function getUserId(){
        return $_SESSION["USER_ID"];        
    }

    function getUserName(){
        return $_SESSION["USER_NAME"];
    }
?>
