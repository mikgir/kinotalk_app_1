<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('news')->insert($this->getData());
    }

    private function getData(): array
    {
        $faker = Factory::create();
        $data = [];

        for ($i = 0; $i < 20; $i++) {
            $title = $faker->sentence(rand(2, 5));
            $body = $faker->sentence(rand(50, 100));

            $data[] = [
                'category_id' => rand(1, 5),
                'source' => $faker->url(),
                'title' => $title,
                'excerpt' => Str::substr($body, 0, 100),
                'body' => $body,
                'image' => 'assets/front/img/user/People' . ($i + 1) . '.png',
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
}
