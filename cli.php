<?php

use Psr\Log\LoggerInterface;
use Tgu\Tolkov\Commands\Arguments;
use Tgu\Tolkov\Commands\CreateUserCommand;
use Tgu\Tolkov\Exceptions\CommandException;

$container = require __DIR__ . '/bootstrap.php';
$command = $container->get(CreateUserCommand::class);

$logger = $container->get(LoggerInterface::class);

try {
    $command->handle(Arguments::fromArgv($argv));
} catch (CommandException $error) {
    $logger->error($error->getMessage(), ['exception' => $error]);
}