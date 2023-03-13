<?php 
use Models\EditPostModel;
use Models\Request;

include('../imports.php');

$id = $_POST['id'] ?? '';
$title = $_POST['title'] ?? '';
$content = $_POST['content'] ?? '';
$author = $_POST['author'] ?? '';


if (in_array('', [$id, $title, $content, $author])) {
    die('Invalid Input');
}

$view = (new EditPostController(new EditPostModel()))->run(new Request($_POST, $_GET));

echo $view->toString();
