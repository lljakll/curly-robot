<?php
    //
    //
    //
    //
    //
?>

<?php include('config.php'); ?>

<?php include( ROOT_PATH . '/includes/reglog.php'); ?>
<?php include( ROOT_PATH . '/includes/head.php'); ?>

    <title>CST126 BLOG Login</title>
</head>
<body>
    <div class="container">
        <?php include( ROOT_PATH . '/includes/navbar.php'); ?>

        <!-- registration FORM -->
        <div class="reglog">
            <form method="post" action="register.php">
                <h2>Enter your information:</h2>
                <input type="text" name="username" value="<?php echo $username; ?>" placeholder="Username">
                <input type="text" name="firstName" value="<?php echo $firstName; ?>" placeholder="First Name">
                <input type="text" name="lastName" value="<?php echo $firstName; ?>" placeholder="Last Name">
                <input type="text" name="email" value="<?php echo $email ?>" placeholder="Electronic Mailing Address">
                <input type="password" name="password" value="" placeholder="Password">
                <input type="password" name="password2" value="" placeholder="Confirm Password">
        </div>
        
    </div>
    <?php include( ROOT_PATH . '/includes/footer.php'); ?>