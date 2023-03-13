<?php

use Controllers\GetAllPostsController;
use Models\GetAllPostsModel;
use Models\Request;

include('../imports.php');

header('Content-type: application/json;');
$view = (new GetAllPostsController(new GetAllPostsModel()))->run(new Request($_POST, $_GET));

echo $view->toString();
