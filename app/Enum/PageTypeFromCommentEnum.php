<?php

namespace App\Enum;

use App\Http\Services\Parser\XMLPath\FilmRUPaths;
use App\Http\Services\Parser\XMLPath\KinonewsPaths;

enum PageTypeFromCommentEnum: string
{
    case Article = 'App\Models\Article';
    case News = 'App\Models\News';

    public function getRouteFromItem(){
        return match($this){
            self::Article => 'articles.show',
            self::News => 'news.show',
        };
    }
}


