<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', ['users' => $users]);
    }

    public function create()
    {
        $establishments = \App\Models\Establishment::all();
        $roles = Role::where('role', '!=', 'superuser')->get();

        return view('admin.users.add', ['establishments' => $establishments, 'roles'=> $roles]);
    }

    public function store(StoreUserRequest $request)
    {
        $validatedData = $request->validated();

        if(isset($validatedData['active'])) {
            $validatedData['active'] = 1;
        } else {
            $validatedData['active'] = 0;
        }

        User::create($validatedData);

        return redirect()->route('admin.users.index')->with('success', 'Usuário criado com sucesso!');
    }

    public function edit($user)
    {
        $user = User::with('establishments')->find($user);
        $establishments = \App\Models\Establishment::all();
        $roles = Role::where('role', '!=', 'superuser')->get();

        return view('admin.users.edit', ['user' => $user, 'establishments' => $establishments, 'roles' => $roles]);
    }

    public function update(UpdateUserRequest $request, $userId)
    {
        $user = User::findOrFail($userId);

        $validatedData = $request->validated();

        if(isset($validatedData['active'])) {
            $validatedData['active'] = 1;
        } else {
            $validatedData['active'] = 0;
        }

        $user->update($validatedData);

        return redirect()->route('admin.users.index')->with('success', 'Usuário atualizado com sucesso!');
    }

    public function view($userId)
    {
        $user = User::findOrFail($userId);
        
        return view('admin.users.view', ['user' => $user]);
    }

    public function destroy($userId)
    {
        $user = User::findOrFail($userId);
        $user->delete();
    }

    public function restore($userId)
    {
        $user = User::withTrashed()->findOrFail($userId);
        $user->restore();

        return redirect()->route('admin.users.index')->with('success', 'Usuário restaurado com sucesso.');
    }

    public function assignRole(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'role_id' => 'required|exists:roles,id',
            'establishment_id' => 'required|exists:establishments,id',
        ]);

        $user = User::findOrFail($request->user_id);
        $user->roles()->attach($request->role_id, ['establishment_id' => $request->establishment_id]);

        return response()->json(['message' => 'Papel atribuído com sucesso']);
    }
}
