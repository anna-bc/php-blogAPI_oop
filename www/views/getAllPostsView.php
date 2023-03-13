<?php

use Models\GetAllPostsModel;
use Models\Model;
use Views\View;

class GetAllPostsView implements View
{
    private array $output = [];

    public function generate(Model $getAllPostsModel) : void
    {
        /**
         * @var GetAllPostsModel $getAllPostsModel
         */
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
