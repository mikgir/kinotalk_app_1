<?php

namespace App\Enum;

use App\Http\Services\Parser\XMLPath\FilmRUPaths;
use App\Http\Services\Parser\XMLPath\KinonewsPaths;

enum ArticleStatusEnum: string
{
    case PUBLISHED = 'PUBLISHED';
    case DRAFT = 'DRAFT';
    case PENDING = 'PENDING';
}


