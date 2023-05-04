<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('categories')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];
        $arr = ['Новое кино', 'Звезды', 'Слухи', 'Сериалы', 'Киноклассика'];

        foreach ($arr as $key => $value) {
            $data[] = [
                'order' => $key + 1,
                'name' => $value,
                'slug' => Str::slug($value),
                'created_at' => now(),
            ];
        }

        return $data;
    }
}
