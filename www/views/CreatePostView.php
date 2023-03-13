<?php 
namespace Views;

use Models\CreatePostModel;

class CreatePostView {
    private array $output = [];

    public function generate(CreatePostModel $createPostModel) {
        $this->output = [
            'status' => $createPostModel->getSuccess() ? 'Success' : 'Error',
            'message' => $createPostModel->getMessage(),
            'data' => [
                'createdPost' => $createPostModel->getCreatedPostString(),
            ],
        ];
    }

    public function toString() : string {
        return json_encode($this->output);
    }
}  