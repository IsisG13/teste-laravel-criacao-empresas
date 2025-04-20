<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\User;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function index()
    {
        $empresas = Empresa::with('user')->get();
        return view('empresas.index', compact('empresas'));
    }
    public function create()
    {
        $users = User::all();
        return view('empresas.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'cnpj' => 'required|string|size:14|unique:empresas',
            'size' => 'required|in:small,medium,large',
            'user_id' => 'required|exists:users,id',
        ]);

        $empresa = Empresa::create($request->all());

        User::where('id', $request->user_id)->increment('number_empresas');

        return redirect()->route('empresas.index')->with('success', 'Empresa criada com sucesso!');
    }

    public function show(Empresa $empresa)
    {
        return view('empresas.show', compact('empresa'));
    }

    public function edit(Empresa $empresa)
    {
        $users = User::all();
        return view('empresas.edit', compact('empresa', 'users'));
    }

    public function update(Request $request, Empresa $empresa)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'cnpj' => 'required|string|size:14|unique:empresas,cnpj,'.$empresa->id,
            'size' => 'required|in:small,medium,large',
            'user_id' => 'required|exists:users,id',
        ]);

        if ($empresa->user_id != $request->user_id) {
            User::where('id', $empresa->user_id)->decrement('number_empresas');
            User::where('id', $request->user_id)->increment('number_empresas');
        }

        $empresa->update($request->all());

        return redirect()->route('empresas.index')->with('success', 'Empresa atualizada com sucesso!');
    }

    public function destroy(Empresa $empresa)
    {
        User::where('id', $empresa->user_id)->decrement('number_empresas');
        $empresa->delete();
        return redirect()->route('empresas.index')->with('success', 'Empresa removida com sucesso!');
    }
}