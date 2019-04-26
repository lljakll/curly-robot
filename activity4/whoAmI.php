<?php
    // CST-126 Blog Project 2.0
    // Module: userInfo  Version: 1.1
    // Jackie Adair
    // 25 April 2019
    // User Info Page
 
    require_once("header.php");
    require_once("myfuncs.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Who Am I</title>
    </head>
    <body>
        <h2>
            My User ID is: <?php echo " " . getUserId(); ?>
            <br />My User Name is: <?php echo " " . getUserName(); ?>
        </h2>
    </body>
</html>

<?php
    require_once("footer.php");
?>