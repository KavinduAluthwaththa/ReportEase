<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT IGNORE INTO Section (section_id, section_name, description) VALUES
        (1, 'Electrical Maintenance', 'Handles electrical systems and wiring'),
        (2, 'Mechanical Maintenance', 'Responsible for machinery and equipment'),
        (3, 'Civil Works', 'Building infrastructure and structural repairs'),
        (4, 'General Maintenance', 'General facility upkeep and repairs')");
    }
}
