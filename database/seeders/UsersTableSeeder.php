<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run(): void
    {
        $users = $this->getUsers();

        foreach ($users as $user) {
            User::create([
                'id' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => bcrypt($user['password']),
                'remember_token' => Str::random(60),
            ]);
        }

        User::find(1)->assignRole('super_admin');
        User::find(2)->assignRole('moderator');
        User::find(3)->assignRole('author');
        User::find(4)->assignRole('author');
        User::find(5)->assignRole('user');
    }

    private function getUsers(): array
    {
        return json_decode($this->getFile(), true);
    }

    private function getFile(): bool|string
    {
        return file_get_contents($this->getPath());
    }

    private function getPath(): string
    {
        return 'database/seeders/json_resources/users.json';
    }
}
