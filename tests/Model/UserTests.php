<?php

namespace UnitTests\Model;

use Tgu\Tolkov\Model\Name;
use Tgu\Tolkov\Model\User;
use Tgu\Tolkov\Model\UUID;
use PHPUnit\Framework\TestCase;

class UserTests extends TestCase
{
    public function testGetData(): void {
        $uuid = UUID::random();
        $username = 'username';
        $name = new Name('fN', 'lN');
        $user = new User($uuid, $username, $name);

        $this->assertEquals($uuid, $user->getUuid());
        $this->assertEquals($username, $user->getUsername());
        $this->assertEquals($name, $user->getName());
    }
}