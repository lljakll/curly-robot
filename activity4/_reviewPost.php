<?php
    // CST-126 Blog Project 2.0
    // Module: displayUsers Fragment  Version: 1.0
    // Jackie Adair
    // 28 April 2019
    // fragment page to display users

    $id = $_GET['id'];

    require_once('header.php');
    require_once('myfuncs.php');
    
    $post = getPost($id);

    echo "Author: " . $post[1];
    ?>
    <br />
    <textarea name="postSubject" rows="1" cols="50"><?php echo $post[2]; ?></textarea>;
    <br />
    <textarea name="postBody" rows="10" cols="50"><?php echo $post[3]; ?></textarea>;
    <?php
    
    echo "<br /><br />Date/Time: " . $post[6] . "<br /><br />Reviewed: ";

            echo "<form method=\"POST\" action=\"updatePost.php\">";
            echo "<input type=\"checkbox\" name=\"reviewStatus\" value=\" ";
            $postID = $id;
            if($post[9]){
                echo "true\" checked";
            }
            else{
                echo "false\"";
            }
            echo " />";
            echo "<br /><br /><input type=\"submit\" value=\"Save\" />";
            echo "</form>";

        echo "<a href=\"postAdmin.php\">Back</a>";




    require_once('footer.php');

?>