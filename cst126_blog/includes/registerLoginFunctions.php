<?php




    $username = "";
    $firstName = "";
    $lastName = "";
    $email = "";
    $password = "";

    $errorArray = array();

    // REGISTER USER
    if (isset($_POST['regUser'])){
        $username = $_POST['username'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password2 = $_POST['pasword2'];

        if (empty($username)){ array_push($error, "A Username is requried"); }
        if (empty($firstName)){ array_push($error, "A First Name is requried"); }
        if (empty($lastName)){ array_push($error, "A Last Name is requried"); }
        if (empty($email)){ array_push($error, "An email is requried"); }
        if (empty($password)){ array_push($error, "A pasword is requried"); }
        if ($password != $password2) { array_push($errors, "The passwords do not match"); }

        // Already registered?  Check username and email
        $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";

        $result = mysli_query($connection, $user_check_query);
        $user = mysqli_fetch_assoc($result);

        // if user already exists
        if ($user) {
            if ($user['username'] === $username) {
                array_push($errors, "Username already exists");
            }
            if ($user['email'] === $email) {
                array_push($errors, "Email already exists");
            }
        }

        // register if there are no errors
        if (count($errors) == 0) {
            $password = md5($password); // encrypt the password
            $query = "INSERT INTO uesrs(USERNAME, FIRST_NAME, LAST_NAME, EMAIL, PASSWORD, ROLE, CREATED, MODIFIED)
            VALUES('$username', '$firstName', '$lastName', '$email', '$pasword', 6, now(), now())";

            mysssqli_query($connection, $query);

            // get id of newly registerd user and put in session array
            $reg_user_id = mysqli_insert_id($connection);
            $_SESSION['user'] = getUserById($reg_user_id);

            // redirect if session is good
            if (($_SESSION['user'])){
                $_SESSION['message'] = "You are now registered and logged in.";
                header('location: index.php');
                exit(0);
            }   
        }
    }

    // user login
    if (isset($_POST['loginUser'])) {
        $username = escapeChar($_POST['username']);
        $password = escapeChar($_POST['password']);

        if (empty($username)) { array_push($errors, "Username is required"); }
        if (empty($password)) { array_push($errors, "Password is required"); }
        if (empty($errors)) {
            $password = md5($password);
            $sql = "SELECT * FROM users WHERE username='$username' and password = '$password' LIMIT 1";

            $result = mysqli_query($connection, $sql);
            if (mysqli_num_rows($result) > 0) {
                // get id
                $user_id = mysqli_fetch_assoc($result)['id'];

                // user into session array
                $_SESSION['user'] = getUserById($user_id);

                
            }
        }
    }



?>