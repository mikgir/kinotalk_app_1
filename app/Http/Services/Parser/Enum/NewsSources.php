<?php

namespace App\Http\Services\Parser\Enum;

use App\Http\Services\Parser\FilmRUParserService;
use App\Http\Services\Parser\KinonewsParserService;
use App\Http\Services\Parser\XMLPath\FilmRUPaths;
use App\Http\Services\Parser\XMLPath\KinonewsPaths;

enum NewsSources: string
{
    case Kinonews = 'https://www.kinonews.ru/rss';
    case FilmRu = 'https://www.film.ru/news';

    public function getPathToElem(){
        return match($this){
            self::Kinonews => new KinonewsPaths(),
            self::FilmRu => new FilmRUPaths(),
        };
    }
}


