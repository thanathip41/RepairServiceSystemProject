<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
class AdminRoleController extends Controller
{
    public function index()
    {
        $users= User::WHERE('activated','=',1)->WHERE('RoleCheck','!=',2)->paginate(5);
        return view('admin.manageUser', compact('users')); 
    }

    public function restoreUser()
    {
        $users= User::WHERE('activated','=',0)->WHERE('RoleCheck','!=',2)->paginate(5);
        return view('admin.restoreUser', compact('users')); 
    }

    public function update(Request $request, $id)
    {   
        $this->validate($request, 
        [ 
          
          'roleCheck'=>'required',
          
        ]); 
        $changeRole = User::find($id); 
        $changeRole->roleCheck = $request->get('roleCheck');
        $changeRole->save(); 
        return back()->with('success', 'Successfully'); 
    }
}
