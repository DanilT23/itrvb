<?php

namespace Tgu\Tolkov\Repositories;

use Tgu\Tolkov\Model\PostLike;
use Tgu\Tolkov\Model\UUID;

interface PostLikeRepositoryInterface
{
    public function save(PostLike $postLike);
    public function getByPostUuid(UUID $postUuid);
}