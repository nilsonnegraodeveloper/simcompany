<?php

namespace App\Http\Controllers;

use App\Models\Deposito;
use App\Models\Conta;
use Illuminate\Http\Request;

class DepositoController extends Controller
{

    public function __construct(Deposito $deposito)
    {
        $this->deposito = $deposito;
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
            )
            ->get();
        return view('app.contas.createDeposito', compact('contas'));
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

        $deposito = $request->all();
        $conta = Conta::find($request->conta_id);
        $deposito['valor'] = str_replace(',', '.', str_replace('.', '', $deposito['valor']));
        $conta['saldo'] = $conta['saldo'] + $deposito['valor'];        

        try {
            Conta::where(['id' => $request->conta_id])->update([
                'saldo' => $conta['saldo'],
            ]);

            $deposito = Deposito::create($deposito);
            return redirect('app/dashboard')->with('success', 'Depósito realizado com Sucesso!');
        } catch (Exception $ex) {
            redirect()->back()->with('error', 'Erro ao tentar depositar Valor!'. $ex);
        }
    }   
}
