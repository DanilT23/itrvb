<?php

namespace myHttp\Actions\Users;

use myHttp\Actions\ActionInterface;
use myHttp\ErrorResponse;
use myHttp\Request;
use myHttp\Response;
use myHttp\SuccessfullResponse;
use Psr\Log\LoggerInterface;
use Tgu\Tolkov\Exceptions\HttpException;
use Tgu\Tolkov\Model\Name;
use Tgu\Tolkov\Model\User;
use Tgu\Tolkov\Model\UUID;
use Tgu\Tolkov\Repositories\UserRepository;
use Tgu\Tolkov\Repositories\UserRepositoryInterface;

class CreateUser implements ActionInterface
{
    public function __construct(
        private UserRepositoryInterface $userRepository,
        private LoggerInterface $logger
    )
    {

    }
    public function handle(Request $request): Response
    {
        $newUserUuid = UUID::random();

        $data = $request->body(['username', 'first_name', 'last_name']);

        try {
            $user = new User(
                $newUserUuid,
                $data['username'],
                new Name(
                    $data['first_name'],
                    $data['last_name'],
                ),
            );
        } catch (HttpException $exception) {
            return new ErrorResponse($exception->getMessage());
        }

        $this->userRepository->save($user);

        $this->logger->info("User created: $newUserUuid");

        return new SuccessfullResponse([
            'uuid' => (string)$newUserUuid
        ]);
    }
}