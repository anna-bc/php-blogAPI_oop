<?php

namespace Views;

use Models\DeletePostModel;
use Models\Model;

class DeletePostView implements View
{

    private array $output = [];

    public function generate(Model $deletePostModel) : void
    {
        /**
         * @var DeletePostModel $deletePostModel
         */
        $this->output = [
            'status' => $deletePostModel->getSuccess() ? 'Success' : 'Error',
            'message' => $deletePostModel->getMessage(),
            'data' => [
                'deletedPostId' => $deletePostModel->getDeletedPostId(),
            ],
        ];
    }

    public function toString(): string
    {
        return json_encode($this->output);
    }
}
