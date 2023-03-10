<?php

namespace Models;

class Request
{
    public function __construct(
        private array $postData = [],
        private array $getData = []
    ) {
    }

    public function getFromGet(string $key, $defaultValue = null): string
    {
        return $this->getData[$key] ?? $defaultValue;
    }
}
