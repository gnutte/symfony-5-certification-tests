<?php

use App\Client;
use Symfony\Component\BrowserKit\HttpBrowser;

require_once 'vendor/autoload.php';
require_once 'src/Client.php';

/*$client = new Client();
$crawler = $client->request('GET', '/');

echo $crawler->count();*/

$client = new HttpBrowser();
$crawler = $client->request('GET', 'https://symfony.com/');

$response = $client->getResponse();
echo $response->getStatusCode();
echo $crawler->filter('li')->count();