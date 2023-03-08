<?php

class Post
{
    private int $id;

    private string $title;

    private string $content;

    private Author $author;

    private DatabaseEngine $dbEngine;

    public function __construct(DatabaseEngine $dbEngine)
    {
        $this->id = hexdec(uniqid());
        $this->dbEngine = $dbEngine;
    }

    public function save()
    {
        $this->dbEngine->createFile(
            'post_' . $this->id,
            json_encode([
                'id' => $this->id,
                'title' => $this->title,
                'content' => $this->content,
                'author' => $this->author->getAuthorName(),
            ])
        );
    }

    public function delete()
    {
        $this->dbEngine->deleteFile('post_' . strval($this->id));
    }

    public static function getPost(DatabaseEngine $dbEngine, int $id): Post
    {
        $contents = $dbEngine->retrieveFile('post_' . $id);
        $decodedContents = json_decode($contents);
        $post = (new Post($dbEngine))->setId($decodedContents->id)->setTitle($decodedContents->title)->setContent($decodedContents->content)->setAuthor($decodedContents->author);
        return $post;
    }

    public function editPost(string $title, string $content, string $author)
    {
        $this->title = $title;
        $this->content = $content;
        $this->author = new Author($author);

        $this->dbEngine->createFile(
            'post_' . $this->id,
            json_encode([
                'id' => $this->id,
                'title' => $this->title,
                'content' => $this->content,
                'author' => $this->author->getAuthorName(),
            ])
        );
    }

    private function setId(int $id) : self {
        $this->id = $id;
        return $this;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setAuthor(string $authorName): self
    {
        $this->author = new Author($authorName);
        return $this;
    }

    public function getAuthor(): string
    {
        return $this->author->getAuthorName();
    }
}
