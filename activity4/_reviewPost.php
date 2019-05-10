<?php
    // CST-126 Blog Project 2.0
    // Module: displayUsers Fragment  Version: 1.0
    // Jackie Adair
    // 28 April 2019
    // fragment page to display users
    // ARRAYS
    // $user = array($id, $firstName, $lastName, $userName, $email, $role);
    // $post = array($id, $userID, $postSubject, $postBody, $language,
    //               $posted, $postDateTime, $postTags, $reviewedByID, $reviewed);

    $id = $_GET['id'];

    require_once('header.php');
    require_once('myfuncs.php');
    
    $post = getPost($id);
    $user = getUserFromID($post[1]);
    ?>

    <form method="POST" action="updatePost.php">
        Author : <?php echo $user[1] .  " " . $user[2]; ?>
        <input type="hidden" name="id" value="<?php echo $post[0]; ?>" />
        <br />
        <textarea name="postSubject" rows="1" cols="50"><?php echo $post[2]; ?></textarea>;
        <br />
        <textarea name="postBody" rows="10" cols="50"><?php echo $post[3]; ?></textarea>;
        <br />
        Posted: <?php echo $post[6]; ?>
        <br />
        Status: <?php 
            if($post[9]){
                echo "Posted";
            }
            else{
                echo "Awaiting Review";
        ?>
        <br /><br />
        <button type="submit">Approve Post</button>
        <?php
            }
        ?>
    </form>
    <a href="postAdmin.php">Back</a>
    
<?php
    require_once('footer.php');
?>