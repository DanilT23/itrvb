<?php

require_once __DIR__. "/vendor/autoload.php";

use Tgu\Tolkov\Model\Article;
use Tgu\Tolkov\Model\Comment;
use Tgu\Tolkov\Model\User;

spl_autoload_register(function ($class) {
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $class) . 'php';
    $index = strripos($file, "Class_");
    if ($index !== false) {
        $name = substr($file, $index+6);
        $file = str_replace("Class_", "Class/$name", $file);
    }
    if (file_exists($file)) {
        require "$class.php";
    }
});

$user = new User(1, "Иван", "Иванович");
$article = new Article(1, $user, "Заголовок1", "Текст1");
$user2 = new User(1, "Данил", "Толков");
$comment = new Comment(1, $user2, $article, "Текст2");


echo $article;
echo "<br/> <br/>";
echo $comment;