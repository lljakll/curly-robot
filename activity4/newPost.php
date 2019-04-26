<?php
    // CST-126 Blog Project 2.0
    // Module: index.php  Version: 1.4
    // Jackie Adair
    // 25 April 2019
    // Site Main Page
 
    require_once("header.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Create a Blog Post</title>
        <link rel="stylesheet" type="text/css" href="css/main.css">
    </head>
    <body>
        <div class="baseForm">
            <form action="createPost.php" method="POST">
                <table>
                    <tr>
                        <td><textarea name="postSubject" rows="1" cols="50" placeholder="Subject"></textarea></td>
                    </tr>
                    <tr>
                        <td><textarea name="postBody" rows="10" cols="50" placeholder="Post Content"></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input type="submit" value="Submit" /></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><a href="index.html">Main Menu</a></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>

<?php
    require_once("footer.php");
?>