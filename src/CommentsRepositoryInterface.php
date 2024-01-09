<?php

namespace Tgu\Tolkov;
interface CommentsRepositoryInterface {
    public function get(string $uuid): Comments;
    public function save(Comments $comment): void;
}