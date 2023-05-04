<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class ArticleLikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Artisan::call('love:register-reactants', ['--model' => "App\Models\Article"]);

        $react = ['Like', 'Dislike'];
        $k = array_rand($react);
        $v = $react[$k];

        for ($i = 0; $i < 15; $i++) {
            $user = User::find(rand(1, 5));
            $reacterFacade = $user->viaLoveReacter();
            $article = Article::find(rand(1, 20));
            $reactantFacade = $article->viaLoveReactant();
            if (!$reactantFacade->isReactedBy($user, $v)) {
                $reacterFacade->reactTo($article, $v);
            }
        }
    }


}
