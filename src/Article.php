<?php
namespace Tgu\Tolkov;
use Tgu\Tolkov\User;

class Article{
    function __construct(private $uuid, private $author_uuid, private string $title, private string $text)
    {

    }
    function __toString()
    {
        return "Заголовок: $this->title <br/> Текст: $this->text <br/> Автор: $this->author_uuid";
    }
}