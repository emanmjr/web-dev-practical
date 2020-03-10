<?php

use Illuminate\Database\Seeder;

use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'administrator@admin.com',
            'password' => Hash::make('Pass!123'),
            'role_id' => 1,
            'created_at' => \Carbon\Carbon::now()
        ]);

        User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => Hash::make('Pass!123'),
            'role_id' => 2,
            'created_at' => \Carbon\Carbon::now()
        ]);
    }
}
