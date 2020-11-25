<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\UserRole;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UsersController extends Controller
{
    public function index()
    {
        $user_list = User::with('role')->get();
        return view('administration.users.index', compact('user_list'));
    }

    public function create()
    {
        $user = new User();
        $roles_list = UserRole::all();
        return view('administration.users.create', compact('user', 'roles_list'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles_list = UserRole::all();
        return view('administration.users.edit', compact('user', 'roles_list'));
    }

    public function store(RegisterUserRequest $request)
    {
        $request->merge(['password' => Hash::make($request['password'])]);
        User::create(
            $request->all()
        );
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        $user = User::where('id', $id)->firstOrFail();
        $user->delete();
        return redirect()->back();
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $request->merge(['password' => Hash::make($request['password'])]);
        $user->update(
            $request->all()
        );
        return redirect()->route('users.index');
    }
}
