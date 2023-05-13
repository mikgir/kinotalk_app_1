<?php

namespace App\MoonShine\Actions;

use App\Http\Services\KinonewsParserService;
use App\Models\Source;
use App\Repositories\CategoryRepository;
use App\Repositories\NewsRepository;
use App\Repositories\SourceRepository;
use MoonShine\Actions\Action;

class ParserAction extends Action
{
    protected bool $inDropdown = false;

    public function handle(): mixed
    {
        $this->parce();

        return redirect('admin');
    }

    public function parce()
    {
        $categoryRepository = new CategoryRepository();
        $sourceRepository = new SourceRepository();
        $newsRepository = new NewsRepository();

        $kinonewsParser = new KinonewsParserService($categoryRepository, $sourceRepository, $newsRepository);

        $sources = $sourceRepository->getAll();

        foreach ($sources as $source) {
            if($source->status === 'ACTIVE') {
                match ($source->url) {
                    'https://www.kinonews.ru/rss' => $kinonewsParser->saveNews($source->url),
                };
            }
        }

    }
}
