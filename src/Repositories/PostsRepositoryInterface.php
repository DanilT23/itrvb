<?php

namespace Tgu\Tolkov\Repositories;

use Tgu\Tolkov\Model\Post;
use Tgu\Tolkov\Model\UUID;

interface PostsRepositoryInterface {
    public function get(UUID $uuid): Post;
    public function save(Post $post): void;
}
?>