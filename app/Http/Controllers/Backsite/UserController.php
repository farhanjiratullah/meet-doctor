<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\DetailUser;
use App\Models\Role;
use App\Models\TypeUser;
use Illuminate\Http\RedirectResponse;
use Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        abort_if(Gate::denies('user_access'), 403);

        $users = User::with(['roles', 'detail_user.type_user'])->orderBy('created_at', 'desc')->get();
        $type_users = TypeUser::all();
        $roles = Role::all();

        return view('pages.backsite.management-accesses.users.index', compact('users', 'roles', 'type_users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        // dd($data);
        $user = User::create($data);

        $user->roles()->sync($request->roles);

        $detail_user = new DetailUser();
        $detail_user->user_id = $user->id;
        $detail_user->type_user_id = $request->type_user_id;
        $detail_user->save();

        alert()->success('Success Message', 'Successfully added new user');
        return redirect()->route('backsite.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user): View
    {
        abort_if(Gate::denies('user_show'), 403);

        $user->load(['roles', 'detail_user.type_user']);

        return view('pages.backsite.management-accesses.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), 403);

        $roles = Role::all();
        $type_users = TypeUser::all();
        $user->load('roles');

        return view('pages.backsite.management-accesses.users.edit', compact('user', 'roles', 'type_users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());

        $user->roles()->sync($request->roles);

        $detail_user = DetailUser::where('user_id', $user->id)->first();
        $detail_user->type_user_id = $request->type_user_id;
        $detail_user->save();

        alert()->success('Success Message', 'Successfully updated user');
        return redirect()->route('backsite.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), 403);

        $user->delete();

        alert()->success('Success Message', 'Successfully deleted user');
        return back();
    }
}
