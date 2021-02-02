<?php

declare(strict_types=1);

require_once 'vendor/autoload.php';

use Symfony\Component\ErrorHandler\Debug;
use Symfony\Component\ErrorHandler\DebugClassLoader;
use Symfony\Component\ErrorHandler\ErrorHandler;
use Symfony\Component\ErrorHandler\ErrorRenderer\HtmlErrorRenderer;

//Debug::enable();

// or enable only one feature
ErrorHandler::register();
DebugClassLoader::enable();

$data = ErrorHandler::call(static function () {
    return $data;
});

var_dump($data);