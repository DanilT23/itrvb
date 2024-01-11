<?php

namespace Tgu\Tolkov\Repositories;

use Tgu\Tolkov\Model\User;
use Tgu\Tolkov\Model\UUID;

interface UserRepositoryInterface {
    public function save(User $user): void;
    public function get(UUID $uuid): User;
    public function getByUsername(string $username): User;
}