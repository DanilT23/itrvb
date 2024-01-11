<?php
namespace Tgu\Tolkov\Repositories;

use Tgu\Tolkov\Model\Comment;
use Tgu\Tolkov\Model\UUID;

interface CommentsRepositoryInterface {
    public function get(UUID $uuid): Comment;
    public function save(Comment $comment): void;
}