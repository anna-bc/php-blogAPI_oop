<?php

namespace Views;

use Models\EditPostModel;
use Models\Model;

class EditPostView implements View
{

    private array $output = [];

    public function generate(Model $editPostModel): void
    {
        /**
         * @var EditPostModel $editPostModel
         */
        $this->output = [
            'status' => $editPostModel->getSuccess(),
            'message' => $editPostModel->getMessage(),
            'data' => [
                'editedPost' => $editPostModel->getEditedPostString(),
            ]
        ];
    }

    public function toString(): string
    {
        return json_encode($this->output);
    }
}
