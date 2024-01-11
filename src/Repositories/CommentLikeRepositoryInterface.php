<?php
namespace Tgu\Tolkov\Repositories;

use Tgu\Tolkov\Model\CommentLike;
use Tgu\Tolkov\Model\UUID;

interface CommentLikeRepositoryInterface
{
    public function save(CommentLike $commentLike);
    public function getByCommentUuid(UUID $commentUuid);
}