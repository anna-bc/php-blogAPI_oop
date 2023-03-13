<?php

use Models\EditPostModel;
use Models\Request;

class EditPostController {

    public function __construct(private EditPostModel $editPostModel) {}

    public function run(Request $request) {
        $id = $request->getFromPost('id', 0);
        $title = $request->getFromPost('title', '');
        $content = $request->getFromPost('content', '');
        $author = $request->getFromPost('author', '');

        if (in_array('', [$title, $content, $author])) {
            $this->editPostModel->setSuccess(false);
            $this->editPostModel->setMessage('Error: Invalid Input! All fields are required');
        }
        else {
            try {
                $post = (Post::getPost(new DatabaseEngine, $id))->setTitle($title)->setContent($content)->setAuthor($author);
                $post->save();

                $this->editPostModel->setSuccess(true);
                $this->editPostModel->setMessage('Succes');
                $this->editPostModel->setEditedPost($post);
            } catch (Exception $e) {
                $this->editPostModel->setSuccess(false);
                $this->editPostModel->setMessage('Error: ' . $e->getMessage());
            }
        }

        $view = new EditPostView();
        $view->generate($this->editPostModel);
        return $view;
    }
}