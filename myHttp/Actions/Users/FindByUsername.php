<?php
namespace myHttp\Actions\Users;

use myHttp\Actions\ActionInterface;
use myHttp\ErrorResponse;
use myHttp\Request;
use myHttp\Response;
use myHttp\SuccessfullResponse;
use Tgu\Tolkov\Exceptions\HttpException;
use Tgu\Tolkov\Exceptions\UserNotFoundException;
use Tgu\Tolkov\Repositories\UserRepository;
use Tgu\Tolkov\Repositories\UserRepositoryInterface;

class FindByUsername implements ActionInterface
{
    public function __construct(
        private UserRepositoryInterface $userRepository,
    ) {}

    public function handle(Request $request): Response
    {
        try {
            $username = $request->query('username');
        } catch (HttpException $ex) {
            return new ErrorResponse($ex->getMessage());
        }

        try {
            $user = $this->userRepository->getByUsername($username);
        } catch (UserNotFoundException $ex) {
            return new ErrorResponse($ex->getMessage());
        }

        return new SuccessfullResponse([
            'username' => $user->getUsername(),
            'name' => (string)$user->getName()
        ]);
    }
}