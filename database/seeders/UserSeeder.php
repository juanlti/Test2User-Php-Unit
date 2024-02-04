<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'name'=>'Juan',
            'email'=>'juan@hotmail.com',
            'password'=>Hash::make('12345'),
        ]);
        User::create([
            'name'=>'Maria',
            'email'=>'Maria@hotmail.com',
            'password'=>Hash::make('12345'),
        ]);
        User::create([
            'name'=>'Roberto',
            'email'=>'Roberto@hotmail.com',
            'password'=>Hash::make('12345'),
        ]);
        User::create([
            'name'=>'Ariel',
            'email'=>'Ariel@hotmail.com',
            'password'=>Hash::make('12345'),
        ]);
    }
}

