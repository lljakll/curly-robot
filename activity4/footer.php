<?php
    // CST-126 Blog Project 2.0
    // Module: Footer  Version: 1.1
    // Jackie Adair
    // 25 April 2019
    // Footer across all pages

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
        <style>
            footer{
                background-color: #eee;
                padding: 15px;
            }
        </style>
    </head>
        
    <body>
        <footer class="container-fluid text-center">
            <p>Copyright &copy 2019 Trilixium Software</p>
            <!-- DEBUG TOKEN: COMMENT OUT BEFORE DEPLOYMENT -->
            <?php echo "-DEBUG-<br />--SESSION INFO--<br />User ID: " . $_SESSION["USER_ID"] . "<br />User Name: " . 
                $_SESSION["USER_NAME"] . "<br />User Role: " . 
                $_SESSION["USER_ROLE"]; ?>
    </body>
</html>