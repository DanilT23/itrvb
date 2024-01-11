<?php

namespace tests\Commands;

use PHPUnit\Framework\TestCase;
use Tgu\Tolkov\Commands\Arguments;
use Tgu\Tolkov\Commands\CreateUserCommand;
use Tgu\Tolkov\Exceptions\CommandException;
use Tgu\Tolkov\Exceptions\UserNotFoundException;
use Tgu\Tolkov\Model\Name;
use Tgu\Tolkov\Model\User;
use Tgu\Tolkov\Model\UUID;
use Tgu\Tolkov\Repositories\UserRepositoryInterface;

class CreateUserCommandTests extends TestCase
{
    private $userRepository;
    private $createUserCommand;

    protected function setUp(): void
    {
        $this->userRepository = $this->createMock(UserRepositoryInterface::class);
        $this->createUserCommand = new CreateUserCommand($this->userRepository);
    }

    public function testHandleCreatesUserWhenNotExists(): void
    {
        $this->userRepository
            ->method('getByUsername')
            ->will($this->throwException(new UserNotFoundException()));

        $arguments = $this->createMock(Arguments::class);
        $arguments->method('get')
            ->willReturnMap([
                ['username', 'testuser'],
                ['first_name', 'Test'],
                ['last_name', 'User']
            ]);

        $this->userRepository
            ->expects($this->once())
            ->method('save');

        $this->createUserCommand->handle($arguments);

        $this->assertTrue(true);
    }

    public function testHandleThrowsExceptionWhenUserExists(): void
    {
        $this->expectException(CommandException::class);
        $this->expectExceptionMessage("User already exists: testuser");

        $username = 'testuser';
        $uuid = UUID::random();
        $this->userRepository
            ->method('getByUsername')
            ->willReturn(new User(
                $uuid,
                $username,
                new Name(
                    "firstName",
                    "lastName"
                )
            ));

        $arguments = $this->createMock(Arguments::class);
        $arguments->method('get')
            ->willReturn($username);

        $this->createUserCommand->handle($arguments);
    }
}