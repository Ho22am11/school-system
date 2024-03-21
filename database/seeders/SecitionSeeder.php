<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SecitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sections')->delete();

        $sections =[
            ['ar' => 'أ' , 'en' => 'a'],
            ['ar' => 'ب' , 'en' => 'b'],
            ['ar' => 'ج' , 'en' => 'c'],
        ];

        foreach($sections as $section){
            Section::create([
                'name' => $section ,
                'grade_id' => Grade::all()->unique()->random()->id ,
                'classroom_id' => Classroom::all()->unique()->random()->id ,
            ]);
        }
    }
}
