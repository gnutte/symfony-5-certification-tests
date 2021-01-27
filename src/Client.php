<?php

declare(strict_types=1);

namespace App;

use Symfony\Component\BrowserKit\AbstractBrowser;
use Symfony\Component\BrowserKit\Response;

class Client extends AbstractBrowser
{
    protected function doRequest($request)
    {
        return new Response('<html><head></head><body></body></html>');
    }
}