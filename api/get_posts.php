<?php

use Controllers\GetAllPostsController;
use Models\GetAllPostsModel;
use Models\Request;

    include('../imports.php');

    $view = (new GetAllPostsController(new GetAllPostsModel()))->run();

    echo $view->toString();
