<?php

namespace App\MoonShine\Actions;

use App\Http\Services\Parser\Enum\NewsSources;
use App\Http\Services\Parser\FilmRUParserService;
use App\Http\Services\Parser\KinonewsParserService;
use App\Repositories\SourceRepository;
use Illuminate\Support\Facades\App;
use MoonShine\Actions\Action;

class ParserAction extends Action
{
    protected bool $inDropdown = false;

    public function handle(): mixed
    {
        $this->parce();

        return redirect('admin/resource/news-resource ');
    }

    /**
     * @return void
     */
    public function parce(): void
    {
        App::call(function (
            SourceRepository $sourceRepository,
            KinonewsParserService $kinonewsParserServiceParser,
            FilmRUParserService $filmRUParserService,
        ){
            $sources = $sourceRepository->getAll();

            foreach ($sources as $source) {
                if($source->status === 'ACTIVE') {
                    $parser = match ($source->url) {
                        NewsSources::Kinonews->value => $kinonewsParserServiceParser,
                        NewsSources::FilmRu->value => $filmRUParserService
                    };

                    $parser->saveNews($source->url);
                }
            }
        });
    }
}
