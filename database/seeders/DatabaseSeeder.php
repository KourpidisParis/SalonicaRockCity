<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name'=>'Xat Trik']);
        Category::create(['name'=>'Bad Movies']);
        Category::create(['name'=>'Delirio']);


        User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('password'),
            'email_verified_at'=>NOW(),
        ]);
    }
}
