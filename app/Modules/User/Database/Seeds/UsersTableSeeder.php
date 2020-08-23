<?php

namespace App\Modules\User\Database\Seeds;

use App\Modules\User\Models\User;
use App\Modules\User\Models\UserProfile;
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
        $user = User::create([
            'username' => 'superadmin',
            'email' => 'admin@kinnus.com',
            'user_type' => 'super_admin',
            'password' => bcrypt('admin'),
        ]);

        UserProfile::create([
            'user_id' => $user->id,
            'first_name' => 'Super',
            'middle_name' => 'And',
            'last_name' => 'Admin',
            'address_line1' => 'Kathmandu',
        ]);
    }
}
