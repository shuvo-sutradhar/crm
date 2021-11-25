<?php

namespace App\Http\Controllers\API;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\RoleResource;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Role::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'name'       => 'required|string|max:255|unique:roles',
            'selectedPermission' => 'required'
        ]);

        // SAVE ROLE
        $role = Role::create([
            'name' => $request->name,
        ]);

        // give permission to the role
        $permissions = Permission::whereIn('slug', $request->selectedPermission)->get()->pluck('id')->toArray();
        $role->permissions()->sync($permissions);

        // Create activity log 
        activity()
        ->performedOn($role)
        ->causedBy(auth()->user())
        ->log("Role <strong>{$role->name}</strong> created");

        return $this->responseWithSuccess('Role added successfully',$role);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $role = new RoleResource(Role::where('slug',$slug)->firstOrfail());
        return $this->responseWithSuccess('Role get successfully',$role);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $role = Role::where('slug',$slug)->first();

        // Validate data
        $request->validate([
            'name'=>'required|max:30|unique:roles,name,'.$role->id
        ]);

        // update role
        $role->name = $request->name;
        $role->save();

        if($request->selectedPermission) {
            // detach permission
            $permissions = Permission::whereIn('slug', $role->permissions->pluck('slug'))->get()->pluck('id')->toArray();
            $role->permissions()->detach($permissions);

            // sync permission
            $permissions = Permission::whereIn('slug', $request->selectedPermission)->get()->pluck('id')->toArray();
            $role->permissions()->sync($permissions);
        }


        // Create activity log 
        activity()
        ->performedOn($role)
        ->causedBy(auth()->user())
        ->log("Role updated");

        return $this->responseWithSuccess('Role and permission updated successfully.',$role);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $role = Role::where('slug', $slug)->first();
        $roleName = $role->name;
        if($role) {
            $role->delete();

            // Create activity log 
            activity()
            ->performedOn($role)
            ->causedBy(auth()->user())
            ->log("Role <strong>{$roleName}</strong> deleted");

            return $this->responseWithSuccess('Role deleted successfully');
        }
        return $this->responseWithError('Opps! You are trying with bad request..');
    }
}
