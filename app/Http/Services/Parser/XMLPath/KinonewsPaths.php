<?php

namespace App\Http\Services\Parser\XMLPath;

use App\Http\Contracts\Paths;

class KinonewsPaths implements Paths
{
    public string $pathToTitle;
    public string $pathToImage;
    public string $pathToBody;

    public function __construct()
    {
        $this->pathToTitle = '//*[@id="current_news"]/div/h1';
        $this->pathToImage = '//*[@id="current_news"]/div/div[2]/img/@src';
        $this->pathToBody = '//*[@id="current_news"]/div/div[4]/div[1]';
    }
}
