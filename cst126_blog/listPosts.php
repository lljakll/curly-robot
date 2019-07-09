<?php 

    // CST-126 Blog Project 1.0
    // create Post Module version 1.0
    // Jackie Adair
    // 7 Jul 2019
    // list all posts

require_once('myfuncs.php');

// connect to the database

    $result = mysqli_query($conn ,$query);

    if(!$result){
        // no posts
    } else {
        // foreach() loop through the data and echo the title to the page as a 
        // link that will call the single_post.php page passing the id of the post.
        // add edit, delete links for each post
    }





?>
