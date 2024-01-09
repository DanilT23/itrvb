<?php

namespace Tgu\Tolkov;
use Tgu\Tolkov\User;
use Tgu\Tolkov\Article;
class Comments
{
    function __construct(private int $id, private User $author, private Article $article, private string $text)
    {

    }

    function __toString()
    {
        return "$this->author написал(а) комментарий $this->text к статье <br/> $this->article";
    }
}