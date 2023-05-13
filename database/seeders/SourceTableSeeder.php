<?php

namespace Database\Seeders;

use App\Models\Source;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SourceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $sources = $this->getSources();

        foreach ($sources as $source) {
            Source::create([
                'id' => $source['id'],
                'name' => $source['name'],
                'url' => $source['url'],
                'status' => 'ACTIVE',
                'created_at' => now(),
            ]);
        }
    }

    private function getSources(): array
    {
        return json_decode($this->getFile(), true);
    }

    private function getFile(): bool|string
    {
        return file_get_contents($this->getPath());
    }

    private function getPath(): string
    {
        return 'database/seeders/json_resources/sources.json';
    }
}
