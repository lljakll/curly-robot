<?php
    //
    //
    //
    //
    //
?>

<?php include('config.php'); ?>

<?php include( ROOT_PATH . '/includes/registerLoginFunctions.php'); ?>
<?php include( ROOT_PATH . '/includes/head.php'); ?>

    <title>CST126 BLOG | Login</title>
</head>
<body>
    <div class="container">
        <?php include( ROOT_PATH . '/includes/navbar.php'); ?>
        <form action="login.php">

            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <label class="sr-only">username</label>
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Username</div>
                        </div>
                        <input type="text" class="form-control" id="username" value="<?php echo $username; ?>">
                    </div>
                </div> 
            </div>

            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <label class="sr-only">password</label>
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Password</div>
                        </div>
                        <input type="password" class="form-control" id="password" value="">
                    </div>
                </div> 
            </div>

            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary" name="loginUser">Login</button>
                </div> 
            </div>

        </form>
        
    </div>
    <?php include( ROOT_PATH . '/includes/footer.php'); ?>