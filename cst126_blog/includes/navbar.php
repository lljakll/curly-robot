<div class="navbar">
    <div class="logo_div">
        <a href="index.php"><h2>CST126 Blog</h2></a>
    </div>
    <ul>
        <li><a href="index.php">Home</a></li>

        <?php 
            if (isset($_SESSION['user'])){
                echo "<li><a href=\"logout.php\">Logout</a></li>";
                echo "<li><a href=\"#\">Create a Post</a></li>";
            }else{
                echo "<li><a href=\"login.php\">Login</a></li>";
                echo "<li><a href=\"register.php\">Register</a></li>";
            }
        ?>
    </ul>
</div>