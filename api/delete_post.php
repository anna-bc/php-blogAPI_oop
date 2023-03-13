<?php
include('../imports.php');

use Controllers\DeletePostController;
use Models\DeletePostModel;
use Models\Request;

$view = (new DeletePostController(new DeletePostModel()))->run(new Request($_POST, $_GET));

echo $view->toString();
