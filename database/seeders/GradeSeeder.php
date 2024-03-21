<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('grades')->delete();

        $grades = [
            [  'ar' => 'المرحله الابتدائه' , 'en' => 'Primary stage' ],
            [  'ar' => 'المرحله الاعدادية' , 'en' => 'middle School' ],
            [  'ar' => 'المرحله الثانوية' , 'en' => 'High School' ],
            ];

        foreach($grades as $grade){
            Grade::create(['name' => $grade]);
        }
    }
}
