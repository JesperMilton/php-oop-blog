<?php

/**
 * Handles the creation of new posts.
 * 
 * Starts a session and cheks if the data has been submitted via 
 * POST.
 * 
 * Processes the Post form data. It retrives the users input 
 * (Title, post-text) and initializes the Post-class to 
 * INSERT the data into the database. Along with users_id.
 */

session_start();

if (isset($_POST['title']) && isset($_POST['post'])) {

    $title = $_POST['title'];
    $post = $_POST['post'];
    $id = $_SESSION['user'];

    require_once '../Classes/Dbh.php';
    require_once '../Classes/Post.php';

    $post = new PostToDbh($title, $post, $id);
    $post->insertPost();

    if ($post){
        header('location: ../index.php');
    }

}
