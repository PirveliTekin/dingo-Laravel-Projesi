<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
          'name'=>'Tekin Gündoğdu',
          'email'=>'gundogdutekin@hotmail.com',
          'password'=>Hash::make('pirveli25')
        ]);
        User::create([
          'name'=>'Hüseyin Gündoğdu',
          'email'=>'gundogduhuseyin@hotmail.com',
          'password'=>Hash::make('pirveli25')
        ]);
        User::create([
          'name'=>'Ahmet Gündoğdu',
          'email'=>'gundogduahmet@hotmail.com',
          'password'=>Hash::make('pirveli25')
        ]);
    }
}
