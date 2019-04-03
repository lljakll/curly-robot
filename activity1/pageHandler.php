<?php
$servername = "localhost";
$username = "activity1";
$password = "activity1";
$dbname = "activity1";
$port = "3307";

$con = new mysqli($servername, $username, $password, $dbname, $port);

// check connection
if ($con->connect_error)
{
    die("Connection Failed: " . $con->connect_error);
}

$first = $_POST["fname"];
$last = $_POST["lname"];

$sql = "INSERT INTO users (FIRST_NAME, LAST_NAME) VALUES ('$first', '$last')";

if ($con->query($sql) === TRUE) 
{
    echo "New record created successfully with the following information: " . $first . " " . $last;
}else {
    echo "Error: " . $sql . "<br />" . $con->error;
}

$con->close();
?>