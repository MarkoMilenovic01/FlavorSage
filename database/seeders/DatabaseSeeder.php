<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Recipe;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $user = User::factory()->create([
        //     'name' => 'John Doe',
        //     'email' => 'john@gmail.com'
        // ]);

        // Recipe::factory(12)->create([
        //     'user_id' => $user->id
        // ]);

        User::factory(3)->create();


        for($i = 1; $i<=5; $i++){
            Recipe::factory()->create(['user_id' => mt_rand(1,3)]);
        }

    }
}
