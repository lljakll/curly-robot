<nav class="navbar navbar-expand-sm bg-dark">
    <a href="index.php"><h3>CST126 Blog</h3></a>
    <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>

        <?php 
            if (isset($_SESSION['user'])){
                echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"logout.php\">Logout</a></li>";
                echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"#\">Create a Post</a></li>";
            }else{
                echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"login.php\">Login</a></li>";
                echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"register.php\">Register</a></li>";
            }
        ?>
    </ul>
</nav>