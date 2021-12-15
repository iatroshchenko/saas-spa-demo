<?php

namespace Database\Seeders;

use App\Models\User;
use App\Repository\UserRepository;
use Illuminate\Database\Seeder;

class UserTokensSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::doesnthave('settings')->get()->all();
        $userRepository = app()->make(UserRepository::class);

        foreach ($users as $user) {
            $userRepository->generateTokens($user);
        }
    }
}
