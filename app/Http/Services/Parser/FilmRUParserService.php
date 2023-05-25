<?php

namespace App\Http\Services\Parser;

use App\Http\Contracts\Parser as Contract;
use App\Http\Services\Parser\Enum\NewsSources;
use App\Repositories\CategoryRepository;
use App\Repositories\NewsRepository;
use App\Repositories\SourceRepository;
use Illuminate\Support\Str;
use Orchestra\Parser\Xml\Facade as Parser;

class FilmRUParserService implements Contract
{
    public function __construct(public SourceRepository $sourceRepository,
                                public NewsRepository $newsRepository)
    {}


    /**
     * Парсит данные с сайта
     * @param string $url
     * @return array
     */
    public function getData(string $url): array
    {
        $sh = curl_init($url);

        curl_setopt($sh, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($sh, CURLOPT_HEADER, false);
        $result = curl_exec($sh);

        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($result);
        libxml_use_internal_errors(false);

        $xpath = new \DOMXPath($dom);
        $news =[];

        $node = $xpath->query('//*[contains(@class, "topic")]/a/@href', $dom);

        $newsLinks = [];
        foreach ($node as $n){
            $newsLinks[] = 'https://www.film.ru' . $n->textContent;
        }

        return $newsLinks;
    }

    /**
     * Сохраняет каждую новость в БД
     * @param string $url
     * @return void
     */
    public function saveNews(string $url): void
    {
        $data = $this->getData($url);

        $categoryTitle = 'FilmRU';

        $paths = NewsSources::from($url)->getPathToElem();

        foreach ($data as $news) {
            if(isset($news['link'])) {
                $news = $this->getNews($news['link'], $paths);
            } else {
                $news = $this->getNews($news, $paths);
            }
            if(!$news){
                continue;
            }

            $news['source_id'] = $this->sourceRepository->getSourceIdByName(NewsSources::tryFrom($url)->name);

            //создаем новую запись в БД
            $this->newsRepository->getOrCreateByParser($news);
        };
    }

    /**
     * Парсит новость по ссылке
     * @param string $link
     * @param object $paths
     * @return array|null
     */
    public function getNews(string $link, object $paths): ?array
    {
        $sh = curl_init($link);

        curl_setopt($sh, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($sh, CURLOPT_HEADER, false);
        curl_setopt($sh, CURLOPT_ENCODING, 'gzip');

        $result = curl_exec($sh);
        $result = mb_convert_encoding($result, 'HTML-ENTITIES', 'UTF-8');

        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);

        $dom->loadHTML($result);

        libxml_use_internal_errors(false);

        $xpath = new \DOMXPath($dom);
        $news =[];

        $node = $xpath->query($paths->pathToTitle, $dom)->item(0);
        $news['title'] = ($node->textContent);

        $node = $xpath->query($paths->pathToImage, $dom)->item(0);
        if(!$node){
            return null;
        }
        $news['image'] = $node->textContent;

        $nodes = $xpath->query($paths->pathToBody, $dom)->item(0);
        $news['body'] = $nodes->textContent;
        $news['body'] = preg_replace("/document\.addEventListener(.*)/s", '', $news['body']);
        $news['body'] = preg_replace("/\n/", '<br><br>', $news['body']);
        $news['body'] = preg_replace("/(^<br>\s*<br>|(<br>\s*){3,})/", '<br><br>', $news['body']);
        $news['body'] = trim($news['body'], " <br>");

        $news['excerpt'] = Str::substr($news['body'], 0, 100);

        return $news;
    }
}
