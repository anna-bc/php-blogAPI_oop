<?php

use Models\GetAllPostsModel;

class GetAllPostsView
{
    private array $output = [];

    public function generate(GetAllPostsModel $getAllPostsModel)
    {
        $this->output = [
            'status' => $getAllPostsModel->getSuccess() ? 'Success' : 'Error',
            'message' => $getAllPostsModel->getMessage(),
            'data' => [
                'createdPost' => $getAllPostsModel->getAllPostsString(),
            ],
        ];
    }

    public function toString(): string
    {
        return json_encode($this->output);
    }
}
