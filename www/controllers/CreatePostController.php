<?php 

namespace Controllers;

use Exception;
use Models\CreatePostModel;
use Models\Request;
use Views\CreatePostView;

class CreatePostController {
    public function __construct(private CreatePostModel $createPostModel) {}

    public function run(Request $request) : CreatePostView {
        $title = $request->getFromPost('title', '');
        $content = $request->getFromPost('content', '');
        $author = $request->getFromPost('author', '');

        if (in_array('', [$title, $content, $author])) {
            $this->createPostModel->setSuccess(false);
            $this->createPostModel->setMessage('Error: Invalid Input! All fields are required');
        } else {
            try {
                $post = (new \Post(new \DatabaseEngine))->setTitle($title)->setContent($content)->setAuthor($author);
                $post->save();

                $this->createPostModel->setSuccess(true);
                $this->createPostModel->setMessage('Success');
                $this->createPostModel->setCreatedPost($post);
            }
            catch (Exception $e) {
                $this->createPostModel->setSuccess(false);
                $this->createPostModel->setMessage('Error: ' . $e->getMessage());
            }
        }

        $view = new CreatePostView();
        $view->generate($this->createPostModel);
        return $view;
    }
}