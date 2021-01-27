<?php

require 'vendor/autoload.php';

use Symfony\Component\Finder\Finder;

$finder = new Finder();

$finder->depth('== 0')->files()->in('var');

foreach ($finder as $file) {
    echo $file->getRelativePathname()."\n";
}

$finder->files()->in('tmp');

foreach ($finder as $file) {
   echo $file->getRelativePathname()."\n";
}
