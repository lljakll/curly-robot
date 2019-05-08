<?php
    // CST-126 Blog Project 2.0
    // Module: displayUsers Fragment  Version: 1.0
    // Jackie Adair
    // 28 April 2019
    // fragment page to display users

    echo "<table><tr><th>ID</th><th>userID</th><th>Subject</th><th>Reviewed</th><th>Date/Time</th></tr>";
    for($x=0;$x<count($posts);$x++){
        echo 
            "<tr><td>" . 
                $posts[$x][0] . 
            "</td><td>" . 
                $posts[$x][1] . 
            "</td><td>" . 
                $posts[$x][2] . 
            "</td><td>";
                if($posts[$x][9]){
                    echo "True";
                }
                else{
                    echo "False";
                }
            echo "</td><td>" .
                $posts[$x][6] . 
            "</td><td>
                <a href=\"_reviewPost.php?id=" . 
                $posts[$x][0] . 
                "\"> Review </a>                
            </td><td>
                Edit
            </td><td>
                Delete
            </td></tr>";
    }
    echo "</table>";
?>