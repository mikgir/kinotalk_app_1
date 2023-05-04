<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class CommentLikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Artisan::call('love:register-reactants', ['--model' => "App\Models\Comment"]);

        $react = ['Like', 'Dislike'];
        $k = array_rand($react);
        $v = $react[$k];

        for ($i = 0; $i < 30; $i++) {
            $user = User::find(rand(1, 5));
            $reacterFacade = $user->viaLoveReacter();
            $comment = Comment::find(rand(1, 50));
            $reactantFacade = $comment->viaLoveReactant();
            if (!$reactantFacade->isReactedBy($user, $v)) {
                $reacterFacade->reactTo($comment, $v);
            }
        }
    }
}
