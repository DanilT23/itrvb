<?php

namespace Tgu\Tolkov;
interface PostsRepositoryInterface {
    public function get(string $uuid): Article;
    public function save(Article $article): void;
}