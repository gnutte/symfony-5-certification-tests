<?php


use App\Command\TestCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Command\HelpCommand;
use Symfony\Component\Console\Command\ListCommand;

require_once '../vendor/autoload.php';
require_once '../src/Command/TestCommand.php';

$application = new Application();
$application->addCommands([
    new ListCommand(),
    new HelpCommand(),
    new TestCommand()
]);

$application->setDefaultCommand('app:test');
$application->run();
