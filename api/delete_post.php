<?php

include('../imports.php');

$id = $_GET['id'] ?? 0;

if (empty($id)) {
    die('No id retrieved');
}

Post::getPost(new DatabaseEngine(), $id)->delete();