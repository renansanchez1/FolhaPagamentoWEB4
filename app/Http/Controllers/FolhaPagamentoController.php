<?php

namespace App\Http\Controllers;

use App\Models\FolhaPagamento;
use App\Models\FolhaFuncionario;
use App\Models\Funcionario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FolhaPagamentoController extends Controller
{
    public function index()
    {
        $folhas = FolhaPagamento::orderBy('competencia', 'desc')->get();
        return view('folhas_pagamento.index', compact('folhas'));
    }

    public function create()
    {
        return view('folhas_pagamento.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'competencia' => 'required|string|date_format:Y-m',
        ]);

        DB::beginTransaction();

        try {
            $competencia = $request->competencia;

            $folha = FolhaPagamento::create([
                'competencia' => $competencia,
                'data_geracao' => now(),
                'valor_total' => 0,
            ]);

            $funcionarios = Funcionario::all();
            $valorTotal = 0;

            foreach ($funcionarios as $funcionario) {

                $adicionais = $funcionario->ocorrencias()
                    ->where('tipo', 'adicional')
                    ->where('data', 'like', "$competencia%")
                    ->sum('valor');

                $descontos = $funcionario->ocorrencias()
                    ->where('tipo', 'desconto')
                    ->where('data', 'like', "$competencia%")
                    ->sum('valor');

                $contas = $funcionario->contasPagar()
                    ->where('status', 'pendente')
                    ->where('data_vencimento', 'like', "$competencia%")
                    ->sum('valor');

                $salarioLiquido = $funcionario->salario + $adicionais - $descontos - $contas;

                FolhaFuncionario::create([
                    'folha_pagamento_id' => $folha->id,
                    'funcionario_id' => $funcionario->id,
                    'salario_base' => $funcionario->salario,
                    'adicionais' => $adicionais,
                    'descontos' => $descontos,
                    'contas_pagar' => $contas,
                    'salario_liquido' => $salarioLiquido,
                ]);

                $valorTotal += $salarioLiquido;
            }

            $folha->valor_total = $valorTotal;
            $folha->save();

            DB::commit();

            return redirect()->route('folhas-pagamento.show', $folha->id)
                ->with('success', 'Folha de pagamento gerada com sucesso!');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->withErrors(['error' => 'Erro ao gerar folha: ' . $e->getMessage()]);
        }
    }

    public function show($id)
    {
        $folha = FolhaPagamento::with('funcionarios.funcionario')->findOrFail($id);
        return view('folhas_pagamento.show', compact('folha'));
    }

    public function destroy($id)
    {
        $folha = FolhaPagamento::findOrFail($id);
        $folha->delete();

        return redirect()->route('folhas-pagamento.index')
            ->with('success', 'Folha de pagamento excluída com sucesso!');
    }
}
