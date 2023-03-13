<?php

use Controllers\CreatePostController;
use Models\CreatePostModel;
use Models\Request;

include('../imports.php');

$view = (new CreatePostController(new CreatePostModel()))->run(new Request($_POST, $_GET));

echo $view->toString();