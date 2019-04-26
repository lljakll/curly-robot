<?php
    // CST-126 Blog Project 2.0
    // Module: Login Module  Version: 1.4
    // Jackie Adair
    // 25 April 2019
    // Logout functions

    require_once('myfuncs.php');
    require_once("header.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>logout</title>
    </head>
    <body>
        <?php
            if(getUserId()){
                echo "<h2>User: " . getUserName() . " has been logged out.</h2><br />";
                clearUser();
            }
            else{
                echo "<h2>You are not logged in, in fact, I'm not entirely sure how you got here.  Please let the site admin know there is a bug that needs squashing</h2>";
            }
        ?>
    </body>
</html>

<?php
    require_once("footer.php");
?>
