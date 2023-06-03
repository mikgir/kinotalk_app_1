<?php

namespace App\Enum;

use App\Http\Services\Parser\XMLPath\FilmRUPaths;
use App\Http\Services\Parser\XMLPath\KinonewsPaths;

enum PageTypeFromCommentEnum: string
{
    case Article = 'App\Models\Article';
    case News = 'App\Models\News';

    public function getRouteFromItem(int $id){
        return match($this){
            self::Article => getenv('APP_URL').'/articles/'.$id,
            self::News => getenv('APP_URL').'/news/'.$id,
        };
    }
}


