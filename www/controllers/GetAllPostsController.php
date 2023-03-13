<?php 
namespace Controllers;

use Controllers\Controller;
use Exception;
use GetAllPostsView;
use Models\GetAllPostsModel;
use Models\Model;
use Models\Request;
use Post;

class GetAllPostsController implements Controller {

    /**
     * @param GetAllPostsModel $getAllPostsModel
     */
    public function __construct(private Model $getAllPostsModel) {}


    public function run(Request $request) : GetAllPostsView {
        try {
            $allPosts = Post::getAllPosts(new \DatabaseEngine());

            $this->getAllPostsModel->setSuccess(true);
            $this->getAllPostsModel->setMessage('Success');
            $this->getAllPostsModel->setAllPosts($allPosts);
        } catch (Exception $e) {
            $this->getAllPostsModel->setSuccess(false);
            $this->getAllPostsModel->setMessage('Error: ' . $e->getMessage());
        }

        $view = new GetAllPostsView();
        $view->generate($this->getAllPostsModel);
        return $view;
    }
}