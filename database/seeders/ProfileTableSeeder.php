<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $faker = Factory::create();
        $users = User::all();

        foreach ($users as $user) {
            Profile::create([
                'user_id' => $user['id'],
                'first_name' => $faker->firstName(),
                'last_name' => $faker->lastName(),
                'occupation' => $faker->jobTitle(),
                'city' => $faker->city(),
                'country' => $faker->country(),
                'website' => $faker->url(),
                'company' => $faker->company(),
                'about_me' => $faker->sentence(rand(5, 15)),
                'bio' => $faker->sentence(rand(10, 25)),
            ]);
        }
    }
}
