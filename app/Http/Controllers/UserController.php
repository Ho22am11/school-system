<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\array_except;
class UserController extends Controller
{
/**


* @return \Illuminate\Http\Response
*/


function __construct()
{
    $this->middleware('permission:قائمة المستخدمين', ['only' => ['index']]);
    $this->middleware('permission:اضافة مستخدم', ['only' => ['create','store']]);
    $this->middleware('permission:تعديل مستخدم', ['only' => ['edit','update']]);
    $this->middleware('permission:حذف مستخدم', ['only' => ['destroy']]);
    $this->middleware('permission:قائمة المستخدمين', ['only' => ['show']]);
    $this->middleware('permission:ازاله صلاحيه', ['only' => ['removeRole']]);
}







public function index(Request $request)
{
$data = User::orderBy('id','DESC')->paginate(5);
return view('users.index',compact('data'))
->with('i', ($request->input('page', 1) - 1) * 5);
}
/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
$roles = Role::all();
return view('users.create',compact('roles'));
}
/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
        'password' => ['required'],
        'role_name' => ['required'],
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    $user->assignRole($request->role_name);


    return back();



}
/**
* Display the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function show($id)
{
$user = User::find($id);
return view('users.show',compact('user'));
}
/**
* Show the form for editing the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function edit($id)
{
$user = User::find($id);
$roles = Role::all();
$userRole = $user->roles->pluck('name','name')->all();
return view('users.edit',compact('user','roles','userRole'));
}
/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function update(Request $request, $id)
{


$user = User::find($id);
$user->name = $request->name;
$user->email = $request->email;
$user->assignRole($request->role_name);
$user->save();
return back();





}
/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{
User::find($id)->delete();
return back();

}

public function removeRole($id , Request $request)
{
$user = User::find($id);
$user->removeRole($request->role_name);
return back();

}




}
