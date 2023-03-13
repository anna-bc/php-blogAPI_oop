<?php

use Controllers\Controller;
use Models\EditPostModel;
use Models\Model;
use Models\Request;
use Views\EditPostView;

class EditPostController implements Controller {

    /**
     * @param EditPostModel $editPostModel
     */
    public function __construct(private Model $editPostModel) {}

    public function run(Request $request): EditPostView {
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
                $this->editPostModel->setMessage('Success');
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