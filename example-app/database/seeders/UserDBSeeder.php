<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserDBSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i<=33; $i++){
            DB::table('users')->insert([
                'name' => "Пользователь №$i",
                'email' =>  Str::random(10).'@gmail.com' ,
                'email_verified_at' => now(),
                'password' =>Hash::make('551151'), // password
            ]);
        }
    }
}
