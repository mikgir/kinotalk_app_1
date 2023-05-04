<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('comments')->insert($this->getData());
    }

    private function getData(): array
    {
        $faker = Factory::create();
        $data = [];
        $hasParentCount = 0;

        for ($i = 0; $i < 50; $i++) {
            $article_id = rand(1, 20);
            $hasParentProbability = rand(1, 10);

            $data[] = $this->getComment($article_id, $faker->sentence(rand(1, 20)), null);

            if ($hasParentProbability > 8) {
                $data[] = $this->getComment(
                    $article_id,
                    $faker->sentence(rand(1, 20)),
                    $i + 1 + $hasParentCount++
                );
            }
        }

        return $data;
    }

    private function getComment($article_id, $body, $parent_id): array
    {
        return [
            'parent_id' => $parent_id,
            'user_id' => rand(1, 5),
            'article_id' => $article_id,
            'body' => $body,
            'status' => $this->getStatus(),
            'featured' => 1,
            'created_at' => now(),
        ];
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
