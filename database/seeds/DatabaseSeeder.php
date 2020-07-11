<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(\App\Modules\User\Database\Seeds\UsersTableSeeder::class);
        $this->call(\App\Modules\User\Database\Seeds\RoleTableSeeder::class);
    }
}

