<?php require_once('config.php'); ?>

<?php
    // Check role and redirect accordingly
    if (!in_array($_SESSION['user']['role'], [1, 2])){
        $_SESSION['message'] = "You are Not Authorized access to this screen!";
        header('location: index.php');
        exit(0);
    } else {
        $_SESSION['message'] = "Welcome to the admin area.";
?>

        <?php include( ROOT_PATH . '/includes/head.php'); ?>
        <?php include( ROOT_PATH . '/includes/navbar.php'); ?>
        <?php include( ROOT_PATH . '/includes/messages.php'); ?>

     
<?php
    }
    include( ROOT_PATH . '/includes/footer.php');
?>