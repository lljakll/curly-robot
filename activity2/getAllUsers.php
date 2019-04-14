<?php
$servername = "localhost";
$username = "activity1";
$password = "activity1";
$dbname = "activity1";
$port = "3306";

@$db = new mysqli($servername, $username, $password, $dbname, $port);

// check connection
if ($db->connect_error)
{
    die("Connection Failed: " . $db->connect_error);
}

$query = "SELECT id, FIRST_NAME, LAST_NAME FROM users";
$stmt = $db->prepare($query);
$stmt->bind_result($id, $first, $last);
$stmt->execute();

$stmt->store_result();

echo "There were " . $stmt->num_rows . " rows returned. \n\n";

echo "<table><tr><td><strong>ID</strong></td><td><strong>First</strong></td><td><strong>Last</strong></td></tr>";

while($stmt->fetch()){
    echo "<tr><td>" . $id . "</td><td>" . $first . "</td><td>" . $last . "</td></tr>";
}

echo "</table>";

$result->free();

$db->close();

?>