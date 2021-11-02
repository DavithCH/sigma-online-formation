<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::create([
        //     'user_id'=> '1',
        //     'user@test.com',
        //     'firstname'=> 'Jonh',
        //     'lastname' => 'Cena',
        //     'role'=> 'user',
        // ]);
        User::factory()->count(5)->create();
    }
}
