<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        Roles::insert([
            ['role_name' => 'supper_admin'],
            ['role_name' => 'admin'],
            ['role_name' => 'visitor'],
        ]);


    }
}
