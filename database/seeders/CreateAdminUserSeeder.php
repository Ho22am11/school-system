<?php
namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class CreateAdminUserSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{
 DB::table('users')->delete();
$user = User::create([
'name' => 'Rahul Shukla',
'email' => 'admin@rscoder.com',
'password' => bcrypt('123456'),

]);



$user = User::create([
    'name' => 'hossam',
    'email' => 'hoho@rscoder.com',
    'password' => bcrypt('123456'),

    ]);
}
}
