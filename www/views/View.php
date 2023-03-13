<?php

namespace Views;

use Models\Model;

interface View {
    public function generate(Model $model): void;

    public function toString() : string;
}