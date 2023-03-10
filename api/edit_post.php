<?php 
include('../imports.php');

$id = $_POST['id'] ?? '';
$title = $_POST['title'] ?? '';
$content = $_POST['content'] ?? '';
$author = $_POST['author'] ?? '';


if (in_array('', [$id, $title, $content, $author])) {
    die('Invalid Input');
}

$post = Post::getPost(new DatabaseEngine(), $id)->setTitle($title)->setContent($content)->setAuthor($author);
$post->save();