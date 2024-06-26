<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEstablishmentRequest;
use App\Http\Requests\UpdateEstablishmentRequest;
use App\Models\Establishment;
use App\Models\Role;
use Illuminate\Http\Request;

class EstablishmentController extends Controller
{
    public function index()
    {
        $establishments = Establishment::all();
        return view('admin.establishments.index', ['establishments' => $establishments]);
    }

    public function create()
    {
        $types = Establishment::pluck('type', 'type')->unique();
        return view('admin.establishments.add', ['types'=> $types]);
    }

    public function store(StoreEstablishmentRequest $request)
    {
        $validatedData = $request->validated();

        if(isset($validatedData['active'])) {
            $validatedData['active'] = 1;
        } else {
            $validatedData['active'] = 0;
        }

        Establishment::create($validatedData);

        return redirect()->route('admin.establishments.index')->with('success', 'Estabelecimento criado com sucesso!');
    }

    public function edit($establishment)
    {
        $establishment = Establishment::find($establishment);
        $types = Establishment::pluck('type', 'type')->unique();

        return view('admin.establishments.edit', ['establishment' => $establishment, 'types' => $types]);
    }

    public function update(UpdateEstablishmentRequest $request, $establishmentId)
    {
        $establishment = Establishment::findOrFail($establishmentId);

        $validatedData = $request->validated();

        if(isset($validatedData['active'])) {
            $validatedData['active'] = 1;
        } else {
            $validatedData['active'] = 0;
        }

        $establishment->update($validatedData);

        return redirect()->route('admin.establishments.index')->with('success', 'Estabelecimento atualizado com sucesso!');
    }
    public function manage($establishmentId)
    {
        $establishment = Establishment::findOrFail($establishmentId);
        
        return view('admin.establishments.manage', ['establishment' => $establishment]);
    }

    public function view($establishmentId)
    {
        $establishment = Establishment::findOrFail($establishmentId);
        
        return view('admin.establishments.manage_view', ['establishment' => $establishment]);
    }

    public function students($establishmentId)
    {
        $establishment = Establishment::findOrFail($establishmentId);
        
        return view('admin.establishments.manage_students', ['establishment' => $establishment]);
    }

    public function users($establishmentId)
    {
        $establishment = Establishment::findOrFail($establishmentId);
        $roles = Role::where('role', '!=', 'superuser')->get();
        
        return view('admin.establishments.manage_users', ['establishment' => $establishment, 'roles' => $roles]);
    }

    public function contracts($establishmentId)
    {
        $establishment = Establishment::findOrFail($establishmentId);
        
        return view('admin.establishments.manage_contracts', ['establishment' => $establishment]);
    }

    public function destroy($establishmentId)
    {
        $establishment = Establishment::findOrFail($establishmentId);
        $establishment->delete();
    }

    public function restore($establishmentId)
    {
        $establishment = Establishment::withTrashed()->findOrFail($establishmentId);
        $establishment->restore();

        return redirect()->route('admin.establishments.index')->with('success', 'Estabelecimento restaurado com sucesso.');
    }

}
