<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $status =[
            [
                'en' => "married",
                'ar' => "متزوج" ,
            ],
            [
                'en' => "dead",
                'ar' => "متوفي" ,

            ],
            [
                'en' => "separated",
                'ar' => "مطلق " ,
            ],
            [
                'en' => "Other",
                'ar' => "اخر " ,
            ]

        ];
        foreach ($status as $statu){
            status::create(['name' => $statu ]);
        }

    }
}
