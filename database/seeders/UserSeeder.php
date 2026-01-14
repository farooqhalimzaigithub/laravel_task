<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name'     => 'Test Admin',
            'email'    => 'test@gmail.com',
            'password' => Hash::make('test@gmail.com'),
        ]);
    }
}
