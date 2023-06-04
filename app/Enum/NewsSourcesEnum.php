<?php

namespace App\Enum;

use App\Http\Services\Parser\XMLPath\FilmRUPaths;
use App\Http\Services\Parser\XMLPath\KinonewsPaths;

enum NewsSourcesEnum: string
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


