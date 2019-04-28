<?php
    // CST-126 Blog Project 1.0
    // Module: Functions  Version: 1.2
    // Jackie Adair
    // 25 April 2019
    // General Site Functions

    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
    
  
    //mysqli_real_connect($con, "jackies-cst126-mysql-server.mysql.database.azure.com", "lljakll@jackies-cst126-mysql-server", {your_password}, {your_database}, 3306);

    function dbConnect(){
        $db=mysqli_init();
        $dbservername = "jackies-cst126-mysql-server.mysql.database.azure.com";
        $dbusername = "lljakll@jackies-cst126-mysql-server";
        $dbpassword = "Kc3nTu2$#@!";
        $dbname = "cst126_blog";
        $dbport = "3306";

        mysqli_real_connect($db, $dbservername, $dbusername, $dbpassword, $dbname, $dbport);

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
