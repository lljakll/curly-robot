<?php
    // CST-126 Blog Project 2.0
    // Module: displayUsers Fragment  Version: 1.0
    // Jackie Adair
    // 7 July 2019
    // fragment page to display users

    echo "<table><tr><th>ID</th><th>First Name</th><th>Last Name</th></tr>";
    // loop through the returned users array and display them in the table
    for($x=0;$x<count($users);$x++){
        echo "<tr><td>" . $users[$x][0] . "</td><td>" . $users[$x][1] . "</td><td>" . $users[$x][2] . "</td></tr>";
    }
    echo "</table>";
?>