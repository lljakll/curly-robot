<?php
    // CST-126 Blog Project 2.0
    // Module: displayUsers Fragment  Version: 1.0
    // Jackie Adair
    // 28 April 2019
    // fragment page to display users

    echo "<table><tr><th>ID</th><th>First Name</th><th>Last Name</th></tr>";
    for($x=0;$x<count($users);$x++){
        echo "<tr><td>" . $users[$x][0] . "</td><td>" . $users[$x][1] . "</td><td>" . $users[$x][2] . "</td></tr>";
    }
    echo "</table>";
?>