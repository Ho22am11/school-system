<?php

namespace Database\Seeders;

use App\Models\My_Parent;
use App\Models\Nationalitie;
use App\Models\Religion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ParentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        My_Parent::create([
            'Email' => 'hossam@fkja',
            'Password' => Hash::make('12121121'),
            'Name_Father' => ['en' => 'mohamed' , 'ar' => 'محمد'],
            'National_ID_Father' => '1213121',
            'Job_Father' => ['en' => 'programmer', 'ar' => 'مبرمج'],
            'Phone_Father' => '01210205796',
            'Religion_Father_id' => Religion::all()->random()->id ,
            'nationality_Father_id' => Nationalitie::all()->random()->id ,
            'Address_Father' => 'manzalh' ,
            'status_father_id' => 1 ,
            'Name_Mother' => ['en' => 'yara' , 'ar' => 'يارا'] ,
            'National_ID_Mother' => '545454' ,
            'Phone_Mother' => '545454542' ,
            'Job_Mother' => ['en' => 'Teacher', 'ar' => 'معلمة'] ,
            'Address_Mother' => 'manzalh' ,
            'nationality_Mother_id' => Nationalitie::all()->random()->id ,
            'Religion_Mother_id' => Religion::all()->random()->id ,
            'status_Mother_id' =>2 ,
        ]);
    }
}
