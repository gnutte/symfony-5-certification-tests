<?php

declare(strict_types=1);

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class GetSFCertificationTopicsCommand extends Command
{
    protected static $defaultName = 'app:symfony:certification:get_topics';

    private HttpClientInterface $client;

    public function __construct(HttpClientInterface $client)
    {
        parent::__construct(self::$defaultName);
        $this->client = $client;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $response = $this->client->request(Request::METHOD_GET, 'https://certification.symfony.com/');

        $chapters = [];

        $crawler = new Crawler($response->getContent());
        $crawler->filter('#symfony5 > ul > li')
            ->each(static function (Crawler $crawler) use ($chapters) : void {
                $chapterName = $crawler->filter('h4')->getNode(0)->textContent;
                foreach ($crawler->filter('ul > li') as $part) {
                    $chapters[$chapterName][] = $part->textContent;
                }
            });

        dump($chapters);

        return 0;
    }

}