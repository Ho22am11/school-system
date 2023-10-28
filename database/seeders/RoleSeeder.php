<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'omo',
            'email' => 'mjdimdomo@rscoder.com',
            'password' => bcrypt('123456'),

            ]);



            $user->assignRole('user');

    }
}
