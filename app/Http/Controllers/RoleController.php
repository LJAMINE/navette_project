<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('dashboard.roles.index',compact('roles'));
    }

    public function create()
    {

        $permissions = Permission::all();
        return view('dashboard.roles.create', compact('permissions'));
    }


    public function store(Request $request){

        
        // $request->validate([
        //     'name' => 'required|string',
        // ]);
// dd("amine");


        $roles=Role::create(['name'=>$request->name]);

        if ($request->has('permissions')) {
            $roles->permissions()->attach($request->permissions);
        }
    }
}
