<?php

namespace myHttp\Actions\Likes;

use myHttp\Actions\ActionInterface;
use myHttp\ErrorResponse;
use myHttp\Request;
use myHttp\Response;
use myHttp\SuccessfullResponse;
use Tgu\Tolkov\Exceptions\CommentLikeNotFoundException;
use Tgu\Tolkov\Exceptions\HttpException;
use Tgu\Tolkov\Model\CommentLike;
use Tgu\Tolkov\Model\UUID;
use Tgu\Tolkov\Repositories\CommentLikeRepository;
use Tgu\Tolkov\Repositories\CommentLikeRepositoryInterface;

class GetByUuidCommentLikes implements ActionInterface
{
    public function __construct(
        private CommentLikeRepositoryInterface $commentLikeRepository
    ) { }

    public function handle(Request $request): Response
    {
        try {
            $commentUuid = $request->query('uuid');
        } catch (HttpException $ex) {
            return new ErrorResponse($ex->getMessage());
        }

        try {
            $commentLikes = $this->commentLikeRepository->getByCommentUuid(new UUID($commentUuid));
        } catch (CommentLikeNotFoundException $ex) {
            return new ErrorResponse($ex->getMessage());
        }

        $likesData = array_map(function (CommentLike $like) {
            return [
                'uuid' => (string)$like->getUuid(),
                'user_uuid' => (string)$like->getUserUuid()
            ];
        }, $commentLikes);

        return new SuccessfullResponse([
            'comment' => $commentUuid,
            'likes' => $likesData
        ]);
    }
}