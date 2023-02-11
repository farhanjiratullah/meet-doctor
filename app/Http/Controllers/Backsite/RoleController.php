<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\Role\StoreRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;
use App\Models\Permission;
use Illuminate\Http\RedirectResponse;
use Gate;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        abort_if(Gate::denies('role_access'), 403);

        $roles = Role::orderBy('created_at', 'desc')->get();

        return view('pages.backsite.management-accesses.roles.index', [
            'roles' => $roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request): RedirectResponse
    {
        Role::create($request->validated());

        alert()->success('Success', 'New Role has been created');

        return to_route('backsite.roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role): View
    {
        abort_if(Gate::denies('role_show'), 403);

        $role->load('permissions');

        return view('pages.backsite.management-accesses.roles.show', [
            'role' => $role
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role): View
    {
        abort_if(Gate::denies('role_edit'), 403);

        $role->load('permissions');
        $permissions = Permission::all();

        return view('pages.backsite.management-accesses.roles.edit', [
            'role' => $role,
            'permissions' => $permissions
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role): RedirectResponse
    {
        
        $role->update($request->validated());
        $role->permissions()->sync($request->permissions);

        alert('Success', 'Role updated successfully');

        return to_route('backsite.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role): RedirectResponse
    {
        abort_if(Gate::denies('role_delete'), 403);

        $role->delete();

        alert('Success', 'Eole deleted successfully');

        return to_route('backsite.roles.index');
    }
}
