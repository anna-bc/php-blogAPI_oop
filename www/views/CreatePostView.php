<?php

namespace Views;

use Models\CreatePostModel;
use Models\Model;

class CreatePostView implements View
{
    private array $output = [];

    public function generate(Model $createPostModel): void
    {
        /**
         * @var CreatePostModel $createPostModel
         */
        $this->output = [
            'status' => $createPostModel->getSuccess() ? 'Success' : 'Error',
            'message' => $createPostModel->getMessage(),
            'data' => [
                'createdPost' => $createPostModel->getCreatedPostString(),
            ],
        ];
    }

    public function toString(): string
    {
        return json_encode($this->output);
    }
}
