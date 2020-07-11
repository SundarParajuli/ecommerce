<?php

namespace App\Modules\User\Database\Seeds;

use App\Modules\User\Models\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create([
            'name' => 'Vendor',
            'sort_order' => 1,
            'status' => 1,
            'created_by_id' => 1,
        ]);
    }
}
