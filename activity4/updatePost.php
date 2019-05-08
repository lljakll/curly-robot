<?php
    // CST-126 Blog Project 2.0
    // Module: displayUsers Fragment  Version: 1.0
    // Jackie Adair
    // 28 April 2019
    // fragment page to display users

    require_once('myfuncs.php');
    require_once('header.php');

    $id = $_POST["postID"];
    $review = $_POST["reviewStatus"];
    $db = dbConnect();

    $query = "UPDATE posts SET reviewed AS $review WHERE id = $id";

    if ($db->query($query) === TRUE){
        return "Success ";
    }
    else{
        return "Fail: " . $query . "<br />" . $db->error;
    }

    require_once('footer.php');

?>  