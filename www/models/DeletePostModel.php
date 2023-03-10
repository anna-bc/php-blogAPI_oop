<?php
namespace Models;

class DeletePostModel {
    private bool $success = false;
    private string $message = '';
    private int $deletedPostId = 0;

    public function setSuccess(bool $success) : self {
        $this->success = $success;
        return $this;
    }

    public function getSuccess() : bool {
        return $this->success;
    }

    public function setMessage(string $message) : self {
        $this->message = $message;
        return $this;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setDeletedPostId(int $id) : self {
        $this->deletedPostId = $id;
        return $this;
    }
    public function getDeletedPostId(): int
    {
        return $this->deletedPostId;
    }
}