<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    public function index()
    {
        $departamentos = Departamento::all();
        return view('departamentos.index', compact('departamentos'));
    }

    public function create()
    {
        return view('departamentos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'iddep' => 'required|max:10',
            'nombredep' => 'required|max:50',
        ]);

        Departamento::create($request->all());
        return redirect()->route('departamentos.index')->with('success', 'Departamento creado exitosamente.');
    }

    public function edit($id)
    {
        $departamento = Departamento::findOrFail($id);
        return view('departamentos.edit', compact('departamento'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombredep' => 'required|max:50',
        ]);

        $departamento = Departamento::findOrFail($id);
        $departamento->update($request->all());

        return redirect()->route('departamentos.index')->with('success', 'Departamento actualizado correctamente.');
    }

    public function destroy($id)
    {
        Departamento::destroy($id);
        return redirect()->route('departamentos.index')->with('success', 'Departamento eliminado.');
    }
}
