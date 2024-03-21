<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Nationalitie;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::create([
            'name' => [ 'en' => 'karim mohamed' , 'ar' => 'كريم محمد'] ,
            'email' => 'hoo@joj' ,
            'password' => Hash::make('21321312'),
            'Nationality_id' => Nationalitie::all()->random()->id,
            'Gender_id' => 1 ,
            'Religion_Father_id' => 1 ,
            'date_of_birth' => '2005' ,
            'Grade_id' => Grade::all()->random()->id ,
            'classroom_id' => Classroom::all()->random()->id ,
            'section_id' => Section::all()->random()->id ,
            'parent_id' => 1 ,
            'academic_year' => 2024 ,
        ]);
    }
}
