<?php

namespace App\Http\Services;

use App\Http\Contracts\Parser as Contract;
use App\Repositories\CategoryRepository;
use App\Repositories\NewsRepository;
use App\Repositories\SourceRepository;
use Illuminate\Support\Str;
use Orchestra\Parser\Xml\Facade as Parser;

class KinonewsParserService implements Contract
{
    public string $url = 'https://www.kinonews.ru';

    public function __construct(public CategoryRepository $categoryRepository,
                                public SourceRepository $sourceRepository,
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

        $categoryTitle = explode(': ', $data['title']);

        foreach ($data['news'] as $news) {
            $news = $this->getNews($news['link']);
            $news['category_id'] = $this->categoryRepository->getCategoryIdByName(end($categoryTitle));
            $news['source_id'] = $this->sourceRepository->getSourceIdByName(end($categoryTitle));

            //создаем новую запись в БД
            $this->newsRepository->getOrCreateByParser($news);
        };
    }

    /**
     * Парсит новость по ссылке
     * @param string $link
     * @return array
     */
    public function getNews(string $link): array
    {
        $sh = curl_init($link);

        curl_setopt($sh, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($sh, CURLOPT_HEADER, false);
        $result = curl_exec($sh);

        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($result);
        libxml_use_internal_errors(false);

        $xpath = new \DOMXPath($dom);
        $news =[];

        $node = $xpath->query('//*[@id="current_news"]/div/h1', $dom)->item(0);
        $news['title'] = ($node->textContent);

        $node = $xpath->query('//*[@id="current_news"]/div/div[2]/img/@src', $dom)->item(0);
        $news['image'] = $this->url . ($node->textContent);

        $nodes = $xpath->query('//*[@id="current_news"]/div/div[4]/div[1]', $dom)->item(0);
        $news['body'] = str_replace('\r\n', '', $nodes->textContent);

        $news['excerpt'] = Str::substr($news['body'], 0, 100);

        return $news;
    }
}
