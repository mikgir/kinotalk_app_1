<?php

namespace App\Http\Services\Parser;

use App\Http\Contracts\Parser as Contract;
use App\Http\Services\Parser\Enum\NewsSources;
use App\Repositories\CategoryRepository;
use App\Repositories\NewsRepository;
use App\Repositories\SourceRepository;
use Illuminate\Support\Str;
use Orchestra\Parser\Xml\Facade as Parser;

class KinonewsParserService implements Contract
{
    public string $url = 'https://www.kinonews.ru';

    public function __construct(public SourceRepository $sourceRepository,
                                public NewsRepository $newsRepository)
    {}

    /**
     * Парсит данные rss
     * @param string $url
     * @return array
     */
    public function getData(string $url): array
    {
        $xml = Parser::load($url);
         $data = $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,guid,description,pubDate]'
            ]
        ]);

        //выбираем только новости (без трейлеров и статей)
        foreach ($data['news'] as $key => $news){
            $newsData = preg_match('/https:\/\/www\.kinonews\.ru\/news*/', $news['link']);

            if(!$newsData){
                unset($data['news'][$key]);
            }
        }

        return $data;
    }

    /**
     * Сохраняет каждую новость в БД
     * @param string $url
     * @return void
     */
    public function saveNews(string $url): void
    {
        $data = $this->getData($url);

        $paths = NewsSources::from($url)->getPathToElem();

        foreach ($data['news'] as $news) {
            $news = $this->getNews($news['link'], $paths);

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
        $news['image'] = $this->url . ($node->textContent);

        $nodes = $xpath->query($paths->pathToBody, $dom)->item(0);
        $news['body'] = $nodes->textContent;
        $news['body'] = preg_replace("/\n/", '<br><br>', $news['body']);
        $news['body'] = preg_replace("/(^<br>\s*<br>|(<br>\s*){3,})/", '<br><br>', $news['body']);
        $news['body'] = trim($news['body'], " <br>");

        $news['excerpt'] = Str::substr($news['body'], 0, 100);

        return $news;
    }
}
