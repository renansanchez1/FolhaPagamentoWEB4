<?php

namespace App\Http\Controllers;
use App\Models\Funcionario;


use App\Models\Ocorrencia;
use Illuminate\Http\Request;

class OcorrenciaController extends Controller
{
    public function index()
    {
        $ocorrencias = Ocorrencia::all();
        return view('ocorrencias.index', compact('ocorrencias'));
    }


public function create()
{
    $funcionarios = Funcionario::all(); 
    return view('ocorrencias.create', compact('funcionarios')); 
}


public function store(Request $request)
{
    $validated = $request->validate([
        'funcionario_id' => 'required|exists:funcionarios,id',
        'descricao' => 'required|string|max:255',
        'tipo' => 'required|string|max:100',
        'valor' => 'required|numeric|min:0',
        'data' => 'required|date',
    ]);

    Ocorrencia::create($validated);

    return redirect()->route('ocorrencias.index')->with('success', 'Ocorrência cadastrada com sucesso!');
}



    public function show($id)
    {
        $ocorrencia = Ocorrencia::findOrFail($id);
        return view('ocorrencias.show', compact('ocorrencia'));
    }

    public function edit($id)
    {
        $ocorrencia = Ocorrencia::findOrFail($id);
        return view('ocorrencias.edit', compact('ocorrencia'));
    }

    public function update(Request $request, $id)
    {
        $ocorrencia = Ocorrencia::findOrFail($id);

        $validated = $request->validate([
            'descricao' => 'required|string|max:255',
            'tipo' => 'required|string|max:100',
            'data' => 'required|date',
        ]);

        $ocorrencia->update($validated);

        return redirect()->route('ocorrencias.index')->with('success', 'Ocorrência atualizada com sucesso!');
    }

    public function destroy($id)
    {
        Ocorrencia::destroy($id);
        return redirect()->route('ocorrencias.index')->with('success', 'Ocorrência removida com sucesso!');
    }
}

