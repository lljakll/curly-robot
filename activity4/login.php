<?php
    // CST-126 Blog Project 2.0
    // Module: Login Module  Version: 1.4
    // Jackie Adair
    // 25 April 2019
    // Login page for the blog site.
 
    require_once("header.php");
    require_once("myfuncs.php");
?>

<html>
    <head>
        <title>Login Form</title>
        <link rel="stylesheet" type="text/css" href="css/main.css">
    </head>
    <body>
        <h1>Login</h1>
        <div class="baseForm">
            <form action="loginHandler.php" method="POST">
                <table>
                    <tr>
                        <td>Username:</td>
                        <td><input type="text" name="userName" /></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input type="password" name="userPass" /></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input type="submit" value="Submit" /></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>

<?php
    require_once("footer.php");
?>