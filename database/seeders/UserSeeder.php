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
        User::factory()->count(5)->create();

        $secret_admin = 'admin';
        $secret_visiter = 'visiter123456';
        $secret_user = "user123456";

        User::create([
            'firstname' => 'John',
            'lastname' => 'Doe',
            'email' => 'john@test.com',
            'password' => bcrypt($secret_visiter),
            'role' => 'VISITER',
        ]);

        User::create([
            'firstname' => 'davith',
            'lastname' => 'chhung',
            'email' => 'admin@admin.com',
            'password' => bcrypt($secret_admin),
            'role' => 'ADMIN',
        ]);

        User::create([
            'firstname' => 'Random',
            'lastname' => 'Teacher',
            'email' => 'test@test.com',
            'password' => bcrypt($secret_user),
            'role' => 'USER',
        ]);
    }
}
