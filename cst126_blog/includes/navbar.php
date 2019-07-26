<div class="navbar navbar-expand-sm bg-dark fixed-top">
    <a href="index.php"><h3>CST126 Blog</h3></a>
    <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>

        <?php
            if (isset($_SESSION['user'])) {
                $sessionRole = $_SESSION['user']['role'];
            }else{
                $sessionRole = 0;
            }
            switch($sessionRole){
                case 6:
                    echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"logout.php\">Logout</a></li>";
                    break;
                case 5:
                case 4:
                case 3:
                   echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"logout.php\">Logout</a></li>";
                   echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"createPost.php\">Create a Post</a></li>";
                    break;
                case 2:
                case 1:
                    echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"logout.php\">Logout</a></li>";
                    echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"createPost.php\">Create a Post</a></li>";
                    echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"adminDashboard.php\">Admin Menu</a></li>";
                    break;
                default:
                    echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"login.php\">Login</a></li>";
                    echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"register.php\">Register</a></li>";
                    break;
            }
        ?>
    </ul>
</div>