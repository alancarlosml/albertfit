<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEstablishmentRequest;
use App\Http\Requests\UpdateEstablishmentRequest;
use Illuminate\Http\Request;

class EstablishmentController extends Controller
{
    public function index()
    {
        $establishments = \App\Models\Establishment::all();
        return view('admin.establishments.index', ['establishments' => $establishments]);
    }

    // public function index(Request $request)
    // {
    //     $query = \App\Models\Establishment::query();

    //     if ($request->has('search')) {
    //         $search = $request->input('search');
    //         $query->where('name', 'like', "%{$search}%")
    //             ->orWhere('type', 'like', "%{$search}%")
    //             ->orWhere('cnpj', 'like', "%{$search}%")
    //             ->orWhere('phone', 'like', "%{$search}%");
    //     }

    //     $establishments = $query->paginate(10);
        
    //     if ($request->ajax()) {
    //         return response()->json([
    //             'html' => view('admin.establishments.partials.table', compact('establishments'))->render(),
    //             'pagination' => (string) $establishments->links()
    //         ]);
    //     }

    //     return view('admin.establishments.index', ['establishments' => $establishments]);
    // }


    public function create()
    {
        $types = \App\Models\Establishment::pluck('type', 'type')->unique();
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

        \App\Models\Establishment::create($validatedData);

        return redirect()->route('admin.establishments.index')->with('success', 'Estabelecimento criado com sucesso!');
    }

    public function edit($establishment)
    {
        $establishment = \App\Models\Establishment::find($establishment);
        $types = \App\Models\Establishment::pluck('type', 'type')->unique();

        return view('admin.establishments.edit', ['establishment' => $establishment, 'types' => $types]);
    }

    public function update(UpdateEstablishmentRequest $request, $establishmentId)
    {
        $establishment = \App\Models\Establishment::findOrFail($establishmentId);

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
        $establishment = \App\Models\Establishment::findOrFail($establishmentId);
        
        return view('admin.establishments.manage', ['establishment' => $establishment]);
    }

    public function view($establishmentId)
    {
        $establishment = \App\Models\Establishment::findOrFail($establishmentId);
        
        return view('admin.establishments.manage_view', ['establishment' => $establishment]);
    }

    public function students($establishmentId)
    {
        $establishment = \App\Models\Establishment::findOrFail($establishmentId);
        
        return view('admin.establishments.manage_students', ['establishment' => $establishment]);
    }

    public function users($establishmentId)
    {
        $establishment = \App\Models\Establishment::findOrFail($establishmentId);
        
        return view('admin.establishments.manage_users', ['establishment' => $establishment]);
    }

    public function contracts($establishmentId)
    {
        $establishment = \App\Models\Establishment::findOrFail($establishmentId);
        
        return view('admin.establishments.manage_contracts', ['establishment' => $establishment]);
    }

    public function destroy($establishmentId)
    {
        $establishment = \App\Models\Establishment::findOrFail($establishmentId);
        $establishment->delete();
    }

    public function restore($establishmentId)
    {
        $establishment = \App\Models\Establishment::withTrashed()->findOrFail($establishmentId);
        $establishment->restore();

        return redirect()->route('admin.establishments.index')->with('success', 'Estabelecimento restaurado com sucesso.');
    }

}
