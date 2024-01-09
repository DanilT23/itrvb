<?php

namespace Tgu\Tolkov;
use Tgu\Tolkov\User;
use Tgu\Tolkov\Article;
class Comments
{
    function __construct(private $uuid, private $author_uuid, private $article_uuid, private string $text)
    {

    }

    function __toString()
    {
        return "$this->author_uuid написал(а) комментарий $this->text к статье <br/> $this->article_uuid";
    }
}