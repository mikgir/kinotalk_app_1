<?php

namespace App\Http\Services;

use App\Http\Contracts\Parser as Contract;
use App\Repositories\CategoryRepository;
use App\Repositories\NewsRepository;
use App\Repositories\SourceRepository;
use Illuminate\Support\Str;
use Orchestra\Parser\Xml\Facade as Parser;
use Goutte\Client;

class KinonewsParserService implements Contract
{
    public string $url = 'https://www.kinonews.ru';

    public function __construct(public CategoryRepository $categoryRepository, public SourceRepository $sourceRepository, public NewsRepository $newsRepository)
    {}

    /**
     * Парсит данные rss
     * @param string $url
     * @return array
     */
    public function getData(string $url = 'https://www.kinonews.ru/rss'): array
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
        $client = new Client();
        $news =[];

        $crawler = $client->request('GET', $link);

        $news['title'] = $crawler->filter('h1')->each(function ($node) {
            return $node->text();
        })[0];

        $news['image'] = $crawler->filter('.txt_bigimg> img')->each(function ($node) {
            $image = $node->attr("src");
            return $this->url . $image;
        })[0];

        $news['body'] = $crawler->filter('.textart')->each(function ($node) {
            return ($node->text());
        })[0];

        $news['excerpt'] = Str::substr($news['body'], 0, 100);

        return $news;
    }
}
