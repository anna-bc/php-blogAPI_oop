<?php

namespace Models;

use Post;

class CreatePostModel {
    private bool $success = false;
    private string $message = '';
    private Post $createdPost;

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

    public function setCreatedPost(Post $post): self
    {
        $this->createdPost = $post;
        return $this;
    }
    public function getCreatedPost(): Post
    {
        return $this->createdPost;
    }

    public function getCreatedPostString() : string {
        return json_encode([
            'id' => $this->createdPost->getId(),
            'title' => $this->createdPost->getTitle(),
            'content' => $this->createdPost->getContent(),
            'author' => $this->createdPost->getAuthor(),
        ]);
    }
}