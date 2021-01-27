<?php

use App\UserConfiguration;
use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Yaml\Yaml;

require_once 'vendor/autoload.php';
require_once 'src/UserConfiguration.php';

$fileLocator = new FileLocator([__DIR__ . '/config']);
$files = $fileLocator->locate('users.yaml', null, false);

$configuration = new UserConfiguration();
$processor = new Processor();

var_dump($files);
foreach ($files as $file) {
    $config = $processor->processConfiguration($configuration, Yaml::parseFile($file));
    var_dump($config);
}