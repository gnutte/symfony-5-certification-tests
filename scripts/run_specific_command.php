<?php

use App\Command\TestCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Command\HelpCommand;
use Symfony\Component\Console\Command\ListCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\StringInput;
use Symfony\Component\Console\Output\BufferedOutput;
use Symfony\Component\Console\Output\NullOutput;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Output\StreamOutput;

require_once 'vendor/autoload.php';
require_once 'src/Command/TestCommand.php';

$application = new Application();
$application->addCommands([
    new ListCommand(),
    new HelpCommand(),
    new TestCommand()
]);

$application->register('app:version')
    ->addUsage('app:version [--major] [--minor]')
    ->addOption('major', 'maj', InputOption::VALUE_OPTIONAL, '', false)
    ->addOption('minor', 'min', InputOption::VALUE_OPTIONAL, '', true)
    ->setCode(function(InputInterface $input, OutputInterface $output): int {
        $output->writeln(sprintf('Version %f', 1.0));

        return Command::SUCCESS;
    });

$output = new BufferedOutput();
$application->find('app:version')->run(new StringInput(''), $output);
echo $output->fetch();
