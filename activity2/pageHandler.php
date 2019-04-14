<?php
$servername = "localhost";
$username = "activity1";
$password = "activity1";
$dbname = "activity1";
$port = "3306";

$con = new mysqli($servername, $username, $password, $dbname, $port);

// check connection
if ($con->connect_error)
{
    die("Connection Failed: " . $con->connect_error);
}

$first = $_POST["fname"];
$last = $_POST["lname"];

if($first == "" || $first == NULL){
    echo "The First Name is a required field and cannot be blank.";
}
else if($last == "" || $last == NULL){
    echo "The Last Name is a required field and cannot be blank.";
}
else{
    $sql = "INSERT INTO users (FIRST_NAME, LAST_NAME) VALUES ('$first', '$last')";

    if ($con->query($sql) === TRUE) 
    {
        echo "New record created successfully with the following information: " . $first . " " . $last;
    }
    else {
        echo "Error: " . $sql . "<br />" . $con->error;
    }
}

$con->close();
?>