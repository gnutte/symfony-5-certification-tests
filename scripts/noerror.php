<?php

declare(strict_types=1);

require_once 'vendor/autoload.php';

use Symfony\Component\ErrorHandler\Debug;
use Symfony\Component\ErrorHandler\ErrorHandler;

Debug::enable();

$data = ErrorHandler::call(static function () {
    return 'Data of called function.';
});

var_dump($data);