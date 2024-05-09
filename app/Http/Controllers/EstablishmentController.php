<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EstablishmentController extends Controller
{
    public function index()
    {
        $establishments = \App\Models\Establishment::all();
        return view('admin.establishments.index', ['establishments' => $establishments]);
    }

    public function create()
    {
        $types = \App\Models\Establishment::pluck('type', 'type')->unique();
        return view('admin.establishments.add', ['types'=> $types]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:academia,crossfit,personal_trainer',
            'owner' => 'required|string|max:255',
            'cnpj' => 'required|string|unique:establishments|max:255',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'social_network' => 'nullable|string|max:255',
            'website' => 'nullable|string|max:255',
            'active' => 'nullable|boolean',
        ]);

        \App\Models\Establishment::create($validatedData);

        return redirect()->route('admin.establishments.index')->with('success', 'Estabelecimento atualizado com sucesso!');
    }

    public function edit($establishment)
    {
        $establishment = \App\Models\Establishment::find($establishment);
        $types = \App\Models\Establishment::pluck('type', 'type')->unique();

        return view('admin.establishments.edit', ['establishment' => $establishment, 'types' => $types]);
    }

    public function update(Request $request, $establishmentId)
    {
        $establishment = \App\Models\Establishment::findOrFail($establishmentId);

        //dd($establishment);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:academia,crossfit,personal_trainer',
            'owner' => 'required|string|max:255',
            'cnpj' => 'required|string|max:255|unique:establishments,cnpj,'.$establishmentId,
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'social_network' => 'nullable|string|max:255',
            'website' => 'nullable|string|max:255',
            'active' => 'nullable|boolean',
        ]);

        // dd($validatedData);

        $establishment->update($validatedData);

        return redirect()->route('admin.establishments.index')->with('success', 'Estabelecimento atualizado com sucesso!');
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
