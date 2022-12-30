<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use \App\Models\User;
use \App\Models\Conta;
use Auth;

class UserController extends Controller
{

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        return view('index');
    }

    public function indexRegister()
    {
        return view('indexRegister');
    }

    public function dashboard()
    {
        $contas = Conta::join('users', 'contas.user_id', '=', 'users.id')
            ->join('tipo_contas', 'contas.tipo_conta_id', '=', 'tipo_contas.id')
            ->select(
                'contas.*',
                'contas.id AS conta_id',
                'users.id AS user_id',
                'users.name AS cliente',
                'tipo_contas.id',
                'tipo_contas.nome AS tipoConta'
            )
            ->where('contas.user_id', Auth::id())
            ->get();

        $totalContas = Conta::where('contas.user_id', Auth::id())
            ->count();

        $totalDepositos = DB::table('depositos')
            ->join('contas', 'contas.id', '=', 'depositos.conta_id')
            ->select('*')
            ->where('contas.user_id', Auth::id())
            ->count();

        $totalSaques = DB::table('saques')
            ->join('contas', 'contas.id', '=', 'saques.conta_id')
            ->select('*')
            ->where('contas.user_id', Auth::id())
            ->count();

        return view('app.dashboard', compact('contas', 'totalDepositos', 'totalSaques', 'totalContas'));
    }

    public function profile()
    {
        return view('app.profile');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:100',
            'email' => 'required|min:3|max:200',
            'cpf' => 'required|unique:users|cpf|min:14|max:14|cpf',
            'password' => 'required|min:8|max:32'
        ]);

        $user = $request->all();
        $nova_senha = preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$%&*()_+=])[A-Za-z\d@#$%&*()_+=]{8,}$/', $user['password']);
        $nova_senha_repeticao = preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$%&*()_+=])[A-Za-z\d@#$%&*()_+=]{8,}$/', $user['confirm_password']);

        //Verifica se as Senhas digitadas conferem
        if ($user['password'] != $user['confirm_password']) {
            return redirect()->back()->with('warning', 'Os campos: "Senha" e "Confirmar Senha" não estão iguais. Por favor, informe corretamente!');
            //Verifica se a Senha possui pelo menos uma letra maiúscula, uma letra minúscula, um número, um caracter especial e no mínimo 8 caracteres
        }
        if (!$nova_senha || !$nova_senha_repeticao) {
            return redirect()->back()->with('warning', 'Sua Senha tem que ter pelo menos uma letra maiúscula, uma letra minúscula, um número, um caracter especial (@#$%&*()_+=) e no mínimo 8 caracteres');
        }

        $user['password'] = password_hash($request->password, PASSWORD_DEFAULT);

        try {
            $user = User::create($user);
            Auth::login($user);
            return redirect('app/dashboard');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Erro ao tentar cadastrar Usuário!' . $ex);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Integer
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('app.users.editUser');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Integer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:100',
            'email' => 'required|min:3|max:200'
        ]);

        $user = User::find(Auth::id());
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password != "") {
            $nova_senha = preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$%&*()_+=])[A-Za-z\d@#$%&*()_+=]{8,}$/', $request->password);
            $nova_senha_repeticao = preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$%&*()_+=])[A-Za-z\d@#$%&*()_+=]{8,}$/', $request->confirm_password);

            //Verifica se as Senhas digitadas conferem
            if ($request->password != $request->confirm_password) {
                return redirect()->back()->with('warning', 'Os campos: "Senha" e "Confirmar Senha" não estão iguais. Por favor, informe corretamente!');
                //Verifica se a Senha possui pelo menos uma letra maiúscula, uma letra minúscula, um número, um caracter especial e no mínimo 8 caracteres
            }
            if (!$nova_senha || !$nova_senha_repeticao) {
                return redirect()->back()->with('warning', 'Sua Senha tem que ter pelo menos uma letra maiúscula, uma letra minúscula, um número, um caracter especial (@#$%&*()_+=) e no mínimo 8 caracteres');
            }
            $request->password = password_hash($request->password, PASSWORD_DEFAULT);
        }

        try {
            $user->update();
            return redirect('app/profile')->with('success', 'Dados atualizados com Sucesso!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Erro ao tentar atualizar meus Dados!' . $ex);
        }
    }
}
