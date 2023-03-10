<?php

namespace Models;

class GetAllPostsModel
{

    private bool $success = false;
    private string $message = '';
    private array $allPosts = [];

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

    public function setAllPosts(array $posts): self
    {
        $this->allPosts = $posts;
        return $this;
    }
    public function getAllPosts(): array
    {
        return $this->allPosts;
    }

    public function getAllPostsString(): string
    {
        $stringifiedPosts = [];
        foreach ($this->allPosts as $post) {
            array_push($stringifiedPosts, json_encode([
                'id' => $post->getId(),
                'title' => $post->getTitle(),
                'content' => $post->getContent(),
                'author' => $post->getAuthor(),
            ]));
        }

        return json_encode(['allPosts' => $stringifiedPosts]);
    }
}
