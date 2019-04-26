<?php
    // CST-126 Blog Project 2.0
    // Module: index.php  Version: 1.4
    // Jackie Adair
    // 25 April 2019
    // Site Main Page
 
    require_once("header.php");
    require_once('myfuncs.php');
    // check login status
    if(!getUserId()){ // if not logged in
        $message = "You must be logged in to post to this Blog.<br /><br />
        <a href=\"login.php\">Login</a>";
        include("messenger.php");
    }
    else{
        // receive content from form
        $postSubject = $_POST["postSubject"];
        $postBody = $_POST["postBody"];
        $userID = getUserId();

        if(strlen($postSubject)>49){ // if subject is 50+ char
            $message = "The Subject is too long.  It must be less than 50 characters.<br /><br />
            <a href=\"newPost.php\">Back</a>";
            include("messenger.php");
        }
        else{
            if(strlen($postBody)>3000){ // if body is 3k+ char
                $message = "The Body is too long.  It must be less than 3000 characters.<br /><br />
                <a href=\"newPost.php\">Back</a>";
                include("messenger.php");
            }
            else{
                if(stristr($postSubject, "badword")){ // check the subject for badwords
                    $message = "There are banned words in the subject.<br /><br />
                    <a href=\"newPost.php\">Back</a>";
                    include("messenger.php");
                }
                else{
                    if(stristr($postBody, "badword")){ // check the body for badwords
                        $message = "There are banned words in the Body.<br /><br />
                        <a href=\"newPost.php\">Back</a>";
                        include("messenger.php");
                    }
                    else{
                        $db = dbConnect();
                        $query = "INSERT INTO posts (userID, postSubject, postBody, posted) VALUES ('$userID', '$postSubject', '$postBody', '1')";

                        if ($db->query($query) === TRUE){
                            $message =  "Successful Post<br /><br />";
                            include("messenger.php");
                        }
                        else{
                            $message = "Error: " . $query . "<br />" . $db->error;
                            include("messenger.php");
                        }
                    }
                }
            }
        }

    }

    require_once("footer.php");
?>