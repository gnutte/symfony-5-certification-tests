<?php

declare(strict_types=1);

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestCommand extends Command
{
    protected static $defaultName = 'app:test';

    protected function configure(): void
    {
        $this->setDescription('Execute test command.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('TEST');

        return Command::SUCCESS;
    }

}