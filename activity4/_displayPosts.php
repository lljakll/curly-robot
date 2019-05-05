<?php
    // CST-126 Blog Project 2.0
    // Module: displayUsers Fragment  Version: 1.0
    // Jackie Adair
    // 28 April 2019
    // fragment page to display users

    echo "<table><tr><th>ID</th><th>userID</th><th>Subject</th><th>Status</th><th>Date/Time</th></tr>";
    for($x=0;$x<count($posts);$x++){
        echo 
            "<tr><td>" . 
                $posts[$x][0] . 
            "</td><td>" . 
                $posts[$x][1] . 
            "</td><td>" . 
                $posts[$x][2] . 
            "</td><td>";
                if($posts[$x][5]){
                    echo "Posted";
                }
                else{
                    echo "Not Posted";
                }
            echo "</td><td>" .
                $posts[$x][6] . 
            "</td></tr>";
    }
    echo "</table>";
?>