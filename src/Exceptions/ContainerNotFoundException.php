<?php

namespace Tgu\Tolkov\Exceptions;

use Psr\Container\NotFoundExceptionInterface;

class ContainerNotFoundException extends \Exception implements NotFoundExceptionInterface
{

}