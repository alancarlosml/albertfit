<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = \App\Models\User::whereHas('establishments', function($query) {
            $query->where('role', '!=', 'instrutor');
        })->get();

        return view('admin.users.index', ['users' => $users]);
    }

    public function create()
    {
        $establishments = \App\Models\Establishment::all();
        $roles = \App\Models\UserEstablishment::select('role')
                    ->where('role', '!=', 'instrutor')
                    ->distinct()
                    ->get();

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

        \App\Models\User::create($validatedData);

        return redirect()->route('admin.users.index')->with('success', 'Usuário criado com sucesso!');
    }

    public function edit($user)
    {
        $user = \App\Models\User::with('establishments')->find($user);
        $establishments = \App\Models\Establishment::all();
        $roles = \App\Models\UserEstablishment::select('role')
                    ->where('role', '!=', 'instrutor')
                    ->distinct()
                    ->get();

        return view('admin.users.edit', ['user' => $user, 'establishments' => $establishments, 'roles' => $roles]);
    }

    public function update(UpdateUserRequest $request, $userId)
    {
        $user = \App\Models\User::findOrFail($userId);

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
        $user = \App\Models\User::findOrFail($userId);
        
        return view('admin.users.view', ['user' => $user]);
    }

    public function destroy($userId)
    {
        $user = \App\Models\User::findOrFail($userId);
        $user->delete();
    }

    public function restore($userId)
    {
        $user = \App\Models\User::withTrashed()->findOrFail($userId);
        $user->restore();

        return redirect()->route('admin.users.index')->with('success', 'Usuário restaurado com sucesso.');
    }
}
