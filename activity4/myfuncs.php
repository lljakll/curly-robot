<?php
    // CST-126 Blog Project 1.0
    // Module: Functions  Version: 1.2
    // Jackie Adair
    // 25 April 2019
    // General Site Functions

    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
    if(!isset($_SESSION["USER_ID"])){
        $_SESSION["USER_ID"] = NULL;
        $_SESSION["USER_NAME"] = NULL;
    }

    function dbConnect(){
        $db=mysqli_init();
// Comment for digitalocean or local/uncomment for azure deployment
//        $dbservername = "jackies-cst126-mysql-server.mysql.database.azure.com";
//        $dbusername = "lljakll@jackies-cst126-mysql-server";
//        $dbpassword = "j@cK13$#@!";

// Comment for azure/uncomment for local or digitalocean
        $dbservername = "localhost";
        $dbusername = "cst126_blog";
        $dbpassword = "cst126_blog";
        $dbname = "cst126_blog";
        $dbport = "3306";

        mysqli_real_connect($db, $dbservername, $dbusername, $dbpassword, $dbname, $dbport);

        if ($db->connect_error)
        {
            die("Connection Failed: " . $db->connect_error);
        }

        return $db;
    }

    // Create Post
    function createPost($userID, $postSubject, $postBody, $posted, $tags){
        $db = dbConnect();
        $query = "INSERT INTO posts (userID, postSubject, postBody, posted, postDateTime, postTags) VALUES ('$userID', '$postSubject', '$postBody', '$posted', now(), '$tags')";

        if ($db->query($query) === TRUE){
            return "Successfully ";
        }
        else{
            return "Error: " . $query . "<br />" . $db->error;
        }
    }

    // Review Post
    function getAllPosts(){
        $db = dbConnect();
        $query = "SELECT * FROM posts";

        $posts = array();
        $index = 0;

        $stmt = $db->prepare($query);
        $stmt->bind_result($id, $userID, $postSubject, $postBody, $language,
            $posted, $postDateTime, $postTags, $reviewedByID, $reviewed);
        $stmt->execute();

        $stmt->store_result();

        while($stmt->fetch()){
            $posts[$index] = array($id, $userID, $postSubject, $postBody, $language,
            $posted, $postDateTime, $postTags, $reviewedByID, $reviewed);
            ++$index;
        }

        $db->close();
        return $posts;

    }
    function getPost($id){
        $db = dbConnect();
        $query = "SELECT * FROM posts WHERE id = $id";

        $post = array();
        $index = 0;

        $stmt = $db->prepare($query);
        $stmt->bind_result($id, $userID, $postSubject, $postBody, $language,
            $posted, $postDateTime, $postTags, $reviewedByID, $reviewed);
        $stmt->execute();

        $stmt->store_result();

        $stmt->fetch();
        $post = array($id, $userID, $postSubject, $postBody, $language,
            $posted, $postDateTime, $postTags, $reviewedByID, $reviewed);

        $db->close();
        return $post;

    }

    // update review flag
    function updateReview($id){

    }

    // Update Post
    function updatePost(){

    }

    // Delete Post
    function deletePost(){

    }

    function saveUser($id, $userName, $role){

        $_SESSION["USER_ID"] = $id;
        $_SESSION["USER_NAME"] = $userName;
        $_SESSION["USER_ROLE"] = $role;
    }

    function clearUser(){

        $_SESSION["USER_ID"] = NULL;
        $_SESSION["USER_NAME"] = NULL;
        $_SESSION["USER_ROLE"] = NULL;
    }

    function getUserId(){
        return $_SESSION["USER_ID"];        
    }

    function getUserName(){
        return $_SESSION["USER_NAME"];
    }

    function getUserRole(){
        return $_SESSION["USER_ROLE"];
    }
?>
