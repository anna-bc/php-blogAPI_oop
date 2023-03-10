<?php
    include('../imports.php');

    $posts = Post::getAllPosts(new DatabaseEngine);


    foreach ($posts as $key => $post) {
        echo '<p>' . $post->getTitle() . '</p> <p>' . $post->getContent() . '</p> <p>' . $post->getAuthor() . '</p>';
    }
?>