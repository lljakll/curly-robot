<?php
    // CST-126 Blog Project 2.0
    // Module: index.php  Version: 1.4
    // Jackie Adair
    // 25 April 2019
    // Site Main Page
    // TODO: Add user_role validation
 
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
        $tags = $_POST["postTags"];
        $userID = getUserId();
        
        // if save button clicked, dont post flag false, if post is clicked post flag true;
        if(isset($_POST['btnSave'])){
            $posted=0;
        }
        else{
            $posted=1;
        }

        switch (true) {

            case (strlen($postSubject)>=50):
                $message = "The Subject is too long.  
                It must be less than 50 characters.<br /><br />
                <a href=\"newPost.php\">Back</a>";
            break;
            case (strlen($postSubject)<=0):
                $message = "There is no subject, Please try again!<br /><br />
                <a href=\"newPost.php\">Back</a>";
            break;
            case (strlen($postBody)>=3000):
                $message = "The Body is too long.  
                It must be less than 3000 characters.<br /><br />
                <a href=\"newPost.php\">Back</a>";
            break;
            case (strlen($postBody)<=0):
                $message = "There is no body, please try again!<br /><br />
                <a href=\"newPost.php\">Back</a>";
            break;
            case (stristr($postSubject,"badword")):
                $message = "There are banned words in the subject.<br /><br />
                <a href=\"newPost.php\">Back</a>";
            break;
            case (stristr($postBody, "badword")):
                $message = "There are banned words in the Body.<br /><br />
                <a href=\"newPost.php\">Back</a>";
            break;
            default:
                $message = createPost($userID, $postSubject, $postBody, $posted, $tags);
                if($posted){
                    $message = $message . "Posted.<br /><br />";
                }
                else{
                    $message = $message . "Saved.<br /><br />";
                }
            break;
        }
        include('messenger.php');

    }
    require_once("footer.php");
?>