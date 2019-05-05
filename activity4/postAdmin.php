<?php
    // CST-126 Blog Project 2.0
    // Module: index.php  Version: 1.4
    // Jackie Adair
    // 25 April 2019
    // TODO: Add user_role validation
?>

<?php
    require_once("header.php");

    // Check permissions
    if($_SESSION["USER_ROLE"] >=4){
        $posts = getAllPosts();
        echo "<h2>POST ADMIN</h2>";
        include('_displayPosts.php');

    }
    else{
        echo "<h2>You must be a post admin to access this function.</h2>";
    }

    require_once("footer.php");
?>