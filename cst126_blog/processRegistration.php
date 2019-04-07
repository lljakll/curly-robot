<?php
    $servername = "localhost";
    $username = "cst126_blog";
    $password = "cst126_blog";
    $database = "users";
    $port = "3306";

    $conn = new mysqli($servername, $username, $password, $database, $port);

    // check the connection
    if ($conn->connect_error)
    {
        die("Connection Failed: " . $conn->connect_error);
    }

    $firstName = $_POST["fName"];
    $lastName = $_POST["lName"];
    $password = $_POST["passwd"];

    $sqlQuery = "INSERT INTO users (f_name, l_name, passwd) VALUES ('$firstName', '$lastName', '$password')";

    if ($con->query($sql) === TRUE)
    {
        echo $firstName . " " . $lastName . " was registered at " . date('H:i') . " on " . date('S F Y');
?>