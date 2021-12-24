<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'firstName' => 'Admin',
            'lastName' => 'Admin',
            'phoneNumber' => '652534669',
            'email' => 'admin@k3.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        User::where(['firstName' => 'Admin'])->first()->assignRole('admin');

        DB::table('users')->insert([
            'firstName' => 'userName',
            'lastName' => 'userSurname',
            'phoneNumber' => '652534768',
            'email' => 'user@k3.com',
            'email_verified_at' => now(),
            'password' => Hash::make('user'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'firstName' => 'userName1',
            'lastName' => 'userSurname1',
            'phoneNumber' => '652554661',
            'email' => 'user1@k3.com',
            'email_verified_at' => now(),
            'password' => Hash::make('user1'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'firstName' => 'userName2',
            'lastName' => 'userSurname2',
            'phoneNumber' => '651534660',
            'email' => 'user2@k3.com',
            'email_verified_at' => now(),
            'password' => Hash::make('user2'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

}
