<?php

namespace Models;

use Post;

class EditPostModel
{
    private bool $success = false;
    private string $message = '';
    private Post $editedPost;

    public function setSuccess(bool $success): self
    {
        $this->success = $success;
        return $this;
    }

    public function getSuccess(): bool
    {
        return $this->success;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;
        return $this;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setEditedPost(Post $post): self
    {
        $this->editedPost = $post;
        return $this;
    }

    public function getEditedPost(): Post
    {
        return $this->editedPost;
    }

    public function getEditedPostString() : string {
        return json_encode([
            'id' => $this->editedPost->getId(),
            'title' => $this->editedPost->getTitle(),
            'content' => $this->editedPost->getContent(),
            'author' => $this->editedPost->getAuthor(),
        ]);
    }
}
