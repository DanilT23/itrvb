<?php

namespace Tgu\Tolkov\Model;

class Comment
{
    function __construct(private UUID $uuid, private UUID $author_uuid, private UUID $article_uuid, private string $text)
    {

    }
    public function getUuid(): UUID {
        return $this->uuid;
    }

    public function getAuthorUuid(): UUID {
        return $this->author_uuid;
    }

    public function getArticleUuid(): UUID {
        return $this->article_uuid;
    }

    public function getText(): string {
        return $this->text;
    }
//    function __toString()
//    {
//        return "$this->author_uuid написал(а) комментарий $this->text к статье <br/> $this->article_uuid";
//    }
}