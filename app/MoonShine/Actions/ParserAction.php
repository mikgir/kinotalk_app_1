<?php

namespace App\MoonShine\Actions;

use App\Http\Services\KinonewsParserService;
use Illuminate\Support\Facades\App;
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

        return redirect('admin/resource/news-resource ');
    }

    public function parce()
    {
        App::call(function (
            CategoryRepository $categoryRepository,
            SourceRepository $sourceRepository,
            NewsRepository $newsRepository,
            KinonewsParserService $parser
        ){
            $sources = $sourceRepository->getAll();

            foreach ($sources as $source) {
                if($source->status === 'ACTIVE') {
                    match ($source->url) {
                        'https://www.kinonews.ru/rss' => $parser->saveNews($source->url),
                    };
                }
            }
        });
    }
}
