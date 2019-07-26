<?php

    $title = "";
    $post = "";
    $errors = array();

    function getPublishedPosts() {
        global $connection;
        $sql = "SELECT * FROM posts WHERE published=true";
        $result = mysqli_query($connection, $sql);

        $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $final_posts = array();

        foreach ($posts as $post) {
            $post['topic'] = getPostTopic($post['id']);
            array_push($final_posts, $post);
        }

        return $final_posts;
    }

    function getPostTopic($post_id) {
        global $connection;
        $sql = "SELECT * FROM topics WHERE id=
                (SELECT topic_id FROM post_topic WHERE post_id=$post_id) LIMIT 1";
        $result = mysqli_query($connection, $sql);
        $topic = mysqli_fetch_assoc($result);
        return $topic;
    }

    function getPublishedPostsByTopic($topic_id) {
        global $connection;
        $sql = "SELECT * FROM posts ps 
                WHERE ps.id IN 
                (SELECT pt.post_id FROM post_topic pt 
                    WHERE pt.topic_id=$topic_id GROUP BY pt.post_id 
                    HAVING COUNT(1) = 1)";
        $result = mysqli_query($connection, $sql);
        // fetch all posts as an associative array called $posts
        $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
        $final_posts = array();
        foreach ($posts as $post) {
            $post['topic'] = getPostTopic($post['id']); 
            array_push($final_posts, $post);
        }
        return $final_posts;
    }

    function getTopicNameById($id) {
        global $connection;
        $sql = "SELECT name FROM topics WHERE id=$id";
        $result = mysqli_query($connection, $sql);
        $topic = mysqli_fetch_assoc($result);
        return $topic['name'];
    }

    function getPost($slug) {
        global $connection;
        // Get single post slug
        $post_slug = $_GET['post-slug'];
        $sql = "SELECT * FROM posts WHERE slug='$post_slug' AND published=true";
        $result = mysqli_query($connection, $sql);
    
        // fetch query results as associative array.
        $post = mysqli_fetch_assoc($result);
        if ($post) {
            // get the topic to which this post belongs
            $post['topic'] = getPostTopic($post['id']);
        }
        return $post;
    }

    function getAllTopics() {
        global $connection;
        $sql = "SELECT * FROM topics";
        $result = mysqli_query($connection, $sql);
        $topics = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $topics;
    }

?>