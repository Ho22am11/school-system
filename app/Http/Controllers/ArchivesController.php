<?php

namespace App\Http\Controllers;

use App\Models\invoices;
use App\Models\involces_details;
use App\Models\involces_attachment;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class ArchivesController extends Controller
{

    function __construct(){
        $this->middleware('permission:اعاده فاتوره',['only'=>['restore']]);
    }
    public function restore($id)
    {

         $flight = Invoices::withTrashed()->where('id', $id)->restore();
         session()->flash('restore_invoice');
         return redirect('/delete_involces');
    }
}
