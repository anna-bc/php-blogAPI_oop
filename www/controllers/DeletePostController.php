<?php

namespace Controllers;

use Exception;
use Models\DeletePostModel;
use Models\Request;
use Views\DeletePostView;

class DeletePostController
{

    public function __construct(
        private DeletePostModel $deletePostModel
    ) {
    }

    public function run(Request $request): DeletePostView
    {
        $id = $request->getFromGet('id', 0);

        if (empty($id)) {
            $this->deletePostModel->setSuccess(false);
            $this->deletePostModel->setMessage('Error: empty id!');
        } else {
            try {
                (new \Post(new \DatabaseEngine()))->setId($id)->delete();

                $this->deletePostModel->setSuccess(true);
                $this->deletePostModel->setMessage('Success');
                $this->deletePostModel->setDeletedPostId($id);
            } catch (Exception $e) {
                $this->deletePostModel->setSuccess(false);
                $this->deletePostModel->setMessage('Error: ' . $e->getMessage());
            }
        }

        $view = new DeletePostView();
        $view->generate($this->deletePostModel);
        return $view;
    }
}
