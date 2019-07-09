<?php

    // 
    //
    //
    //
    //

    session_start();

    // connect to the database
    $connection = mysqli_connect("localhost", "cst126_blog", "cst126_blog", "cst126_blog");

    if(!$connection){
        die("Error at database connection: " . mysqli_connect_error());
    }

    // global constants
    define ('ROOT_PATH', realpath(dirname(__FILE__)));
    define ('BASE_URL', 'http://localhost/curly-robot/cst126_blog/');

?>