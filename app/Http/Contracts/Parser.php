<?php

namespace App\Http\Contracts;

use App\Repositories\CategoryRepository;
use App\Repositories\NewsRepository;
use App\Repositories\SourceRepository;

interface Parser
{
    public function __construct(SourceRepository $sourceRepository,
                                NewsRepository $newsRepository);

    /**
     * @param string $url
     * @return void
     */
    public function saveNews(string $url): void;

    /**
     * @param string $url
     * @return array
     */
    public function getData(string $url): array;

    /**
     * @param string $link
     * @param object $paths
     * @return array|null
     */
    public function getNews(string $link, object $paths): ?array;
}
