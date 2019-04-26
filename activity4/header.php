<?php
    // CST-126 Blog Project 2.0
    // Module: header  Version: 1.1
    // Jackie Adair
    // 25 April 2019
    // header across all pages

    require_once("myfuncs.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <?php
                        if($_SESSION["USER_ID"]){
                            echo "<a class=\"navbar-brand\" href=\"whoAmI.php\">" . $_SESSION["USER_NAME"] . "</a>";
                        }
                        else{
                            echo "<a class=\"navbar-brand\" href=\"index.php\">BLOG</a>";
                        }
                    ?>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                    <?php
                        if(!getUserId()){
                            echo "<li><a href=\"login.php\">Login</a></li>";
                        }
                        else{
                            echo "<li><a href=\"logout.php\">Logout</a></li>";                           
                        }
                    ?>
                    <li><a href="register.php">Register</a></li>
                    <li><a href="newPost.php">Post</a></li>
                </ul>
            </div>
        </nav>
    </body>
</html>