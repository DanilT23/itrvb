<?php

namespace UnitTests\Model;

use Tgu\Tolkov\Model\Comments;
use Tgu\Tolkov\Model\UUID;
use PHPUnit\Framework\TestCase;

class CommentTests extends TestCase
{
    public function testGetData(): void {
        $uuid = UUID::random();
        $authorUuid = UUID::random();
        $articleUuid = UUID::random();
        $text = 'Text';
        $comment = new Comments(
            $uuid,
            $authorUuid,
            $articleUuid,
            $text
        );

        $this->assertEquals($uuid, $comment->getUuid());
        $this->assertEquals($authorUuid, $comment->getAuthorUuid());
        $this->assertEquals($articleUuid, $comment->getArticleUuid());
        $this->assertEquals($text, $comment->getText());
    }
}