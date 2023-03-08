<?php

include('../imports.php');

$title = $_POST['title'] ?? '';
$content = $_POST['content'] ?? '';
$author = $_POST['author'] ?? '';


if (in_array('', [$title, $content, $author])) {
    die('Invalid Input');
}

$post = (new Post(new DatabaseEngine()))->setTitle($title)->setContent($content)->setAuthor($author);

$post->save();
