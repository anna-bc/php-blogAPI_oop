<?php 
namespace Controllers;

use Exception;
use Models\GetAllPostsModel;
use Models\Request;
use Post;

class GetAllPostsController {
    
    public function __construct(private GetAllPostsModel $getAllPostsModel) {}

    public function run() {
        try {
            $allPosts = Post::getAllPosts(new \DatabaseEngine());

            $this->getAllPostsModel->setSuccess(true);
            $this->getAllPostsModel->setMessage('Success');
            $this->getAllPostsModel->setAllPosts($allPosts);
        } catch (Exception $e) {
            $this->getAllPostsModel->setSuccess(false);
            $this->getAllPostsModel->setMessage('Error: ' . $e->getMessage());
        }

        $view = new \GetAllPostsView();
        $view->generate($this->getAllPostsModel);
        return $view;
    }
}