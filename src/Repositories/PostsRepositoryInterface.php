<?php

namespace Tgu\Tolkov\Repositories;
use Tgu\Tolkov\Model\Article;

interface PostsRepositoryInterface {
    public function get(string $uuid): Article;
    public function save(Article $article): void;
}