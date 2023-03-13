<?php

namespace Controllers;

use Models\Model;
use Models\Request;
use Views\View;

interface Controller {

    public function __construct(Model $model);

    public function run(Request $request) : View;
}