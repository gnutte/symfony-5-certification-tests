<?php

declare(strict_types=1);

require_once 'vendor/autoload.php';

use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Yaml;

$files = scandir('./config/');
$files = array_filter($files, static function($file) { return !in_array($file, ['.', '..']); });

try {
    dump(Yaml::parse('!php/object \'O:8:"stdClass":1:{s:5:"foo";s:7:"bar";}\'', Yaml::PARSE_EXCEPTION_ON_INVALID_TYPE));
}catch (ParseException $exception) {
    dump(Yaml::parse('!php/object \'O:8:"stdClass":1:{s:5:"foo";s:7:"bar";}\''));
}

foreach ($files as $file) {
    dump('>>>>>>>>>>>>>>>>>>>>>>>>>');
    dump($file);
    try {
        dump(Yaml::parseFile('./config/' . $file, Yaml::PARSE_OBJECT_FOR_MAP));
    }catch(ParseException $exception) {
        dump('Can not parse ' . $file);
    } finally {
        dump(Yaml::parseFile(
            './config/' . $file,
            Yaml::PARSE_CONSTANT | Yaml::PARSE_DATETIME | Yaml::PARSE_CUSTOM_TAGS | Yaml::PARSE_OBJECT
        ));
    }
}

