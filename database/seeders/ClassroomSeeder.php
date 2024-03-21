<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('classrooms')->delete();
        $classrooms =[
            ['ar' => 'الصف الاول' , 'en' => 'First grade'],
            ['ar' => 'الصف الثاني' , 'en' => 'Second grade'],
            ['ar' => 'الصف الثالث' , 'en' => 'Third grade'],

        ];

        foreach($classrooms as $classroom){
            Classroom::create([
                'name' =>  $classroom ,
                'Grade_id' => Grade::all()->unique()->random()->id
            ]);
        }
    }
}
