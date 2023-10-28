<?php
namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{
$user = User::create([
'name' => 'Rahul Shukla',
'email' => 'admin@rscoder.com',
'password' => bcrypt('123456'),

]);
$role = Role::create(['name' => 'owner']);
$permissions = Permission::pluck('id','id')->all();
$role->syncPermissions($permissions);
$user->assignRole([$role->id]);

$user = User::create([
    'name' => 'hossam',
    'email' => 'hoho@rscoder.com',
    'password' => bcrypt('123456'),

    ]);
    $role = Role::create(['name' => 'user']);


    $user->assignRole('user');
}
}
