<?php

namespace Database\Seeders;

use App\Models\Article;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('articles')->insert($this->getData());

        $articles = Article::all();

        foreach ($articles as $article) {
            $article->tagById($this->array_fill_rand(2, 1, 10));
        }
    }

    private function getData(): array
    {
        $faker = Factory::create();
        $data = [];

        for ($i = 0; $i < 20; $i++) {
            $title = $faker->sentence(rand(2, 5));
            $body = $faker->sentence(rand(50, 100));

            $data[] = [
                'user_id' => rand(1, 4),
                'category_id' => rand(1, 5),
                'title' => $title,
                'excerpt' => Str::substr($body, 0, 100),
                'body' => $body,
                'image' => 'assets/front/img/user/People' . ($i + 1) . '.png',
//                'image_id'=> rand(1,10),
                'image_type'=>'Article',
                'slug' => Str::slug($title),
                'status' => $this->getStatus(),
                'featured' => 1,
                'created_at' => now(),
            ];
        }

        return $data;
    }

    private function getStatus(): string
    {
        $status_id = rand(1, 10);

        if ($status_id == 1) {
            $status = 'DRAFT';
        } elseif ($status_id == 2) {
            $status = 'PENDING';
        } else {
            $status = 'PUBLISHED';
        }

        return $status;
    }

    function array_fill_rand($limit, $min = false, $max = false)
    {
        $limit = (int)$limit;
        $array = array();

        if ($min !== false && $max !== false) {
            $min = (int)$min;
            $max = (int)$max;
            for ($i = 0; $i < $limit; $i++) {
                $array[$i] = rand($min, $max);
            }
        } else {
            for ($i = 0; $i < $limit; $i++) {
                $array[$i] = rand();
            }
        }

        return $array;
    }
}
