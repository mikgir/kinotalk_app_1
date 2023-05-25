<?php

namespace App\Http\Services\Parser\XMLPath;

use App\Http\Contracts\Paths;

class FilmRUPaths implements Paths
{
    public string $pathToTitle;
    public string $pathToImage;
    public string $pathToBody;

    public function __construct()
    {
        $this->pathToTitle = '//*[@id="block-system-main"]/div/div/div[1]/div[1]/h1';
        $this->pathToImage = '//*[@id="block-system-main"]/div/div/div[1]/div[1]/div[3]/img/@data-src';
        $this->pathToBody = '//*[@id="block-system-main"]/div/div/div[1]/div[1]/div[4]';
    }
}
