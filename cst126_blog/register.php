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
        <form method="post" action="register.php">
            <?php include(ROOT_PATH . '/includes/errors.php') ?>
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <label class="sr-only">Email</label>
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Email</div>
                        </div>
                        <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <label class="sr-only">username</label>
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Username</div>
                        </div>
                        <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
                    </div>
                </div>
            </div>
        
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <label class="sr-only">firstName</label>
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">First</div>
                        </div>
                    <input type="text" class="form-control" name="firstName" value="<?php echo $firstName; ?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <label class="sr-only">lastName</label>
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Last</div>
                        </div>
                        <input type="text" class="form-control" name="lastName" value="<?php echo $lastName; ?>">
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
                        <input type="password" class="form-control" name="password" value="">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <label class="sr-only">password2</label>
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Confirm</div>
                        </div>
                        <input type="password" class="form-control" name="password2" value="">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary" name="regUser">Submit</button>
                </div>
            </div>
        </form>
    </div>
    <?php include( ROOT_PATH . '/includes/footer.php'); ?>