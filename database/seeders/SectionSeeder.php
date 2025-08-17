<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Section;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sections = [
            ['section_name' => 'Faculty Administration', 'description' => 'Administrative section for faculty management'],
            ['section_name' => 'Maintenance Department', 'description' => 'Technical maintenance and facility management'],
            ['section_name' => 'Computer Science', 'description' => 'Computer Science department'],
            ['section_name' => 'Engineering', 'description' => 'Engineering department'],
            ['section_name' => 'Science', 'description' => 'Science department'],
            ['section_name' => 'Business', 'description' => 'Business and management studies'],
        ];

        foreach ($sections as $section) {
            Section::create($section);
        }
    }
}
