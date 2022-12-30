<?php

namespace App\Http\Controllers;

use App\Models\Conta;
use App\Models\TipoConta;
use Illuminate\Http\Request;
use PDF;

class ContaController extends Controller
{
    public function __construct(Conta $conta)
    {
        $this->conta = $conta;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function graficos()
    {
        return view('app.contas.graficos');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function relatorios()
    {
        return view('app.contas.relatorios');
    }

    public function gerarPdf()
    {
        $contas = Conta::join('tipo_contas', 'contas.tipo_conta_id', '=', 'tipo_contas.id')
            ->select(
                'contas.*',
                'contas.id AS conta_id',
                'tipo_contas.nome AS tipoConta'
            )
            ->get();

        $pdf = PDF::loadView('app/contas/relatorioContas', compact('contas'));

        return $pdf->setPaper('a4')->stream('relatorioContas.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoContas = TipoConta::all();
        return view('app.contas.createConta', compact('tipoContas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipo_conta_id' => 'required|integer',
            'saldo' => 'required'
        ]);

        $conta = $request->all();
        $conta['saldo'] = str_replace(',', '.', str_replace('.', '', $conta['saldo']));

        try {
            $conta = Conta::create($conta);
            return redirect('app/dashboard')->with('success', 'Conta aberta com Sucesso!');
        } catch (Exception $ex) {
            redirect()->back()->with('error', 'Erro ao tentar cadastrar Produto!' . $ex);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Conta  $conta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $conta = Conta::find($id);
        $saldoConta = $conta['saldo'];
        if ($conta['saldo'] > 0) {
            return redirect()->back()->with('warning', 'Você tem R$ ' . number_format($saldoConta, 2, ',', '.') . ' disponível(is) em Conta, efetue o Saque!');
        }

        try {
            $conta->delete();
            return redirect('app/dashboard')->with('success', 'Conta cancelada com Sucesso!');
        } catch (Exception $ex) {
            redirect()->back()->with('error', 'Erro ao tentar cancelar Conta!' . $ex);
        }
    }
}
