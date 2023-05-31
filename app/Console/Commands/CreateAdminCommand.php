<?php

namespace App\Console\Commands;

use App\Models\User;
use Faker\Factory;
use Illuminate\Console\Command;

class CreateAdminCommand extends Command
{
    protected $signature = 'admin:create';

    protected $description = 'Creates admin';

    public function handle(): void
    {
        // Consider moving to a factory
        $faker = Factory::create();
        $user = User::create([
            'name' => $faker->firstNameMale(),
            'email' => $faker->email(),
            'password' => $faker->password(),
        ]);
        $this->info($user->createToken('auth', [User::$adminAbility])->plainTextToken);
    }
}
