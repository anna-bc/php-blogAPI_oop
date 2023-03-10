<?php

namespace Views;

use Models\DeletePostModel;

class DeletePostView
{

    private array $output = [];

    public function generate(DeletePostModel $deletePostModel)
    {
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
