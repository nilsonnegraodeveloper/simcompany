<?php

namespace App\Http\Controllers;

use App\Models\Saque;
use App\Models\Conta;
use Illuminate\Http\Request;
use Auth;

class SaqueController extends Controller
{
    
    public function __construct(Saque $saque)
    {
        $this->saque = $saque;
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contas = Conta::join('tipo_contas', 'contas.tipo_conta_id', '=', 'tipo_contas.id')
            ->select(
                'contas.*',
                'contas.id AS conta_id',
                'tipo_contas.nome AS tipoConta'
            )->where('contas.saldo', '>', 0)
            ->get();
        return view('app.contas.createSaque', compact('contas'));
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
            'conta_id' => 'required|integer',
            'valor' => 'required'
        ]);

        $saque = $request->all();
        $conta = Conta::find($request->conta_id);
        $saque['valor'] = str_replace(',', '.', str_replace('.', '', $saque['valor']));
        $saldoConta = $conta['saldo'];        
        $conta['saldo'] = $conta['saldo'] - $saque['valor'];

        if ($saldoConta  < $saque['valor']) {
            return redirect()->back()->with('warning', 'Saldo insuficiente! Você só tem R$ '.number_format($saldoConta, 2, ',', '.'). ' disponível(is) em Conta');
        }        

        try {
            Conta::where(['id' => $request->conta_id])->update([
                'saldo' => $conta['saldo'],
            ]);

            $saque = Saque::create($saque);
            return redirect('app/dashboard')->with('success', 'Saque realizado com Sucesso!');
        } catch (Exception $ex) {
            redirect()->back()->with('error', 'Erro ao tentar sacar Valor!'. $ex);
        }
    }
}
