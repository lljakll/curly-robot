<?php




    $username = "";
    $firstName = "";
    $lastName = "";
    $email = "";
    $password = "";

    $errors = array();

    // REGISTER USER
    if (isset($_POST['regUser'])){
        echo "sitting in the regUser conditional";
        $username = $_POST['username'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
        echo "just got passed the following: " . $username . $firstName . $lastName . $email . $password . $password2;

        if (empty($username)){ array_push($errors, "A Username is requried"); }
        if (empty($firstName)){ array_push($errors, "A First Name is requried"); }
        if (empty($lastName)){ array_push($errors, "A Last Name is requried"); }
        if (empty($email)){ array_push($errors, "An email is requried"); }
        if (empty($password)){ array_push($errors, "A pasword is requried"); }
        if ($password != $password2) { array_push($errors, "The passwords do not match"); }

        // Already registered?  Check username and email
        $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";

        $result = mysqli_query($connection, $user_check_query);
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
            $query = "INSERT INTO users(username, first_name, last_name, email, password, role, created, modified) VALUES('$username', '$firstName', '$lastName', '$email', '$password', 6, now(), now())";

            if(!mysqli_query($connection, $query)){
                echo "Error: " . mysqli_error($connection);
            }

            // get id of newly registerd user and put in session array
            $reg_user_id = mysqli_insert_id($connection);
            $_SESSION['user'] = getUserById($reg_user_id);

            // redirect if session is good
            if (($_SESSION['user'])){
                $_SESSION['message'] = "You are now registered and logged in as an UNVERIFIED user.";
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

                // Check role and redirect accordingly
                $sessionRole = $_SESSION['user']['role'];
                switch($sessionRole){
                    case 6:
                        $_SESSION['message'] = "you are now logged in as a UNVERIFIED user.";
                        header('location: index.php');
                        break;
                    case 5:
                    case 4:
                    case 3:
                        $_SESSION['message'] = "you are now logged in as a VERIFIED user.";
                        header('location: index.php');
                        break;
                    case 2:
                    case 1:
                        $_SESSION['message'] = "You are now logged in as admin";
                        header('location: index.php');
                        break;
                    default:
                        $_SESSION['message'] = "There was an error logging you in, please try again";
                        header('location: logoug.php');
                        break;
                }
            } else {
                array_push($errors, 'Bad username or password');
            }
        }
    }

    function escapeChar(String $value){
        
        global $connection;

        // remove empty space
        $val = trim($value);
        // escape the data
        $val = mysqli_real_escape_string($connection, $value);

        return $val;
    }

    // Get user info by id
    function getUserById($id){
        global $connection;
        $sql = "SELECT * FROM users WHERE id=$id LIMIT 1";

        $result = mysqli_query($connection, $sql);
        $user = mysqli_fetch_assoc($result);

        // returns user in array
        return $user;
    }


?>