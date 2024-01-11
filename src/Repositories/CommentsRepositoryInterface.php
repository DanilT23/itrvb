<?php

namespace Tgu\Tolkov\Repositories;
use Tgu\Tolkov\Model\Comments;

interface CommentsRepositoryInterface {
    public function get(string $uuid): Comments;
    public function save(Comments $comment): void;
}