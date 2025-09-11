<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT IGNORE INTO Roles (role_id, role_name) VALUES
        (1, 'Admin'),
        (2, 'Faculty Staff'),
        (3, 'Maintenance Department'),
        (4, 'Student')");
    }
}
