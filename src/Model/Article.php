<?php
namespace Tgu\Tolkov\Model;

class Article{
    function __construct(private UUID $uuid, private UUID $author_uuid, private string $title, private string $text)
    {

    }
    public function getUuid(): UUID {
        return $this->uuid;
    }

    public function getAuthorUuid(): UUID {
        return $this->author_uuid;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getText(): string {
        return $this->text;
    }
    function __toString()
    {
        return "Заголовок: $this->title <br/> Текст: $this->text <br/> Автор: $this->author_uuid";
    }
}