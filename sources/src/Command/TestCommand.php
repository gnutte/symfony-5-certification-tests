<?php

declare(strict_types=1);

namespace App\Command;

use Symfony\Component\Asset\Package;
use Symfony\Component\Asset\PathPackage;
use Symfony\Component\Asset\UrlPackage;
use Symfony\Component\Asset\VersionStrategy\EmptyVersionStrategy;
use Symfony\Component\Asset\VersionStrategy\JsonManifestVersionStrategy;
use Symfony\Component\Asset\VersionStrategy\StaticVersionStrategy;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestCommand extends Command
{
    protected static $defaultName = 'app:test';

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $table = new Table($output);
        $table->setHeaders(['Information', 'Version', 'Url']);

        $packages = [
            'Package empty version' => new Package(new EmptyVersionStrategy()),
            'Package with static version strategy' => new Package(new StaticVersionStrategy('v1')),
            'Package with manifest version strategy' => new Package(new JsonManifestVersionStrategy(__DIR__ . '/manifest.json')),
            'PathPackage with static version strategy' => new PathPackage('/static/images', new StaticVersionStrategy('v1')),
            'UrlPackage with static version strategy' => new UrlPackage('http://static.example.com/images/', new StaticVersionStrategy('v1'))
        ];

        foreach ($packages as $label => $package) {
            $table->addRow([
                $label,
                $package->getVersion('image.png'),
                $package->getUrl('image.png'),
            ]);
        }

        $table->render();

        return 0;
    }

}