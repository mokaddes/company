<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{

        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $permissions = Permission::all();

            return view('admin.permissions.index', [
                'permissions' => $permissions
            ]);
        }

        /**
         * Show form for creating permissions
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            return view('admin.permissions.create');
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
                'name' => 'required|unique:users,name',
                'group_name' => 'required'
            ]);

            try {
                Permission::create($request->only('name','group_name'));
                Toastr::success(trans('Permission created successfully.'), 'Success', ["positionClass" => "toast-top-right"]);
            } catch (\Exception $e) { 
                Toastr::error(trans($e->getMessage()), 'Error', ["positionClass" => "toast-top-right"]);
            }
           
            return redirect()->route('admin.permissions.index');
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  Permission  $post
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            $permission = Permission::find($id);
            return view('admin.permissions.edit', [
                'permission' => $permission
            ]);
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  Permission  $permission
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, $id)
        {
            $permission = Permission::find($id);
            $request->validate([
                'name' => 'required|unique:permissions,name,'.$permission->id,
                'group_name' => 'required'
            ]);

            $permission->update($request->only('name','group_name'));
            Toastr::success(trans('Permission updated successfully.'), 'Success', ["positionClass" => "toast-top-center"]);
            return redirect()->route('admin.permissions.index');
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  \App\Models\Post  $post
         * @return \Illuminate\Http\Response
         */
        public function destroy( $id)
        {
            Permission::find($id)->delete();
            Toastr::success(trans('Permission deleted successfully.'), 'Success', ["positionClass" => "toast-top-center"]);
            return redirect()->route('admin.permissions.index');
        }
}
