<?php

include('imports.php');

$id = $_GET['id'] ?? '';

if (empty($id)) {
    die("No id");
}

$post = Post::getPost(new DatabaseEngine(), $id);

?>

<form action="./api/edit_post.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $id ?>" />
    <input type="text" name="title" value="<?php echo $post->getTitle() ?>" />
    <input type="text" name="content" value="<?php echo $post->getContent() ?>" />
    <input type="text" name="author" value="<?php echo $post->getAuthor() ?>" />
    <input type="submit" value="Submit">
</form>