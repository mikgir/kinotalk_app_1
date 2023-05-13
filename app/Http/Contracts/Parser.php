<?php

namespace App\Http\Contracts;

use App\Repositories\CategoryRepository;
use App\Repositories\NewsRepository;
use App\Repositories\SourceRepository;

interface Parser
{
    public function __construct(CategoryRepository $categoryRepository,SourceRepository $sourceRepository,NewsRepository $newsRepository);

    /**
     * @return array
     */
    public function saveNews(string $url): void;

    public function getData(string $url): array;

    public function getNews(string $link): array;
}
