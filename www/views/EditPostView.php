<?php

use Models\EditPostModel;

class EditPostView {

    private array $output = [];

    public function generate(EditPostModel $editPostModel) {
        $this->output = [
            'status' => $editPostModel->getSuccess(),
            'message' => $editPostModel->getMessage(),
            'data' => [
                'editedPost' => $editPostModel->getEditedPostString(),
            ]
        ];
    }

    public function toString() : string {
        return json_encode($this->output);
    }
}