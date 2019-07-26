<?php require_once('config.php'); ?>
<?php include( ROOT_PATH . '/includes/publicFunctions.php'); ?>
<?php include( ROOT_PATH . '/includes/head.php'); ?>

<?php
    // Check role and redirect accordingly
    if (!in_array($_SESSION['user']['role'], [1, 2])){
        $_SESSION['message'] = "You are Not Authorized access to this screen!";
        header('location: index.php');
        exit(0);
    } else {
?>
    <div class="container">
    <?php include( ROOT_PATH . '/includes/navbar.php'); ?>
        <form method="post" action="createPost.php">
            <?php include(ROOT_PATH . '/includes/errors.php') ?>

            <div class="row">
                <div class="col-sm-*">
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?php echo $title; ?>">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-*">
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="form-group">
                            <label for="title">Post</label>
                            <textarea class="form-control" id="post" name="post" rows=3><?php echo $post; ?></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-*">
                    <button type="submit" class="btn btn-primary" name="submitPost">Submit</button>
                </div>
            </div>
        </form>
    </div>
     
<?php
    }
    include( ROOT_PATH . '/includes/footer.php');
?>