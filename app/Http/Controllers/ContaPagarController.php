<?php

namespace App\Http\Controllers;

use App\Models\ContaPagar;
use App\Models\Funcionario;
use Illuminate\Http\Request;

class ContaPagarController extends Controller
{
    public function index()
    {
        $contas = ContaPagar::with('funcionario')->get();
        return view('contas_pagar.index', compact('contas'));
    }

    public function create()
    {
        $funcionarios = Funcionario::all();
        return view('contas_pagar.create', compact('funcionarios'));
    }

    public function store(Request $request)
    {
        ContaPagar::create($request->all());
        return redirect()->route('contas-pagar.index')->with('success', 'Conta cadastrada com sucesso!');
    }

public function edit($id)
{
    $conta = ContaPagar::findOrFail($id);
    $funcionarios = Funcionario::all();
    return view('contas_pagar.edit', compact('conta', 'funcionarios'));
}


public function update(Request $request, $id)
{
    $conta = ContaPagar::findOrFail($id);

    $validated = $request->validate([
        'funcionario_id' => 'required|exists:funcionarios,id',
        'descricao' => 'required|string|max:255',
        'valor' => 'required|numeric|min:0',
        'data_vencimento' => 'required|date',
    ]);

    $conta->update($validated);

    return redirect()->route('contas-pagar.index')->with('success', 'Conta atualizada com sucesso!');
}


    public function destroy($id)
    {
        ContaPagar::destroy($id);
        return redirect()->route('contas-pagar.index')->with('success', 'Conta excluída.');
    }
}

