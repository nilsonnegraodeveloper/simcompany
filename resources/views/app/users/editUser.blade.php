@extends('app._layouts.base')

@section('content')   

@section('title') 
    <h4 class="page-title">USUÁRIOS</h4>
@endsection

@section('sub_title')   
<h2>Editar Usuário<small></small></h2>
@endsection

<form method="POST" action="/app/users/{{ auth()->user()->id }}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
    @csrf
    @method('PUT')
   
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nome">Nome <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="text" id="nome" value="{{ auth()->user()->name }}" name="name" maxlenght="100" class="form-control" required="" />
        </div>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nome">CPF <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="text" value="{{ auth()->user()->cpf }}" class="form-control" readonly />
        </div>
    </div>
    
    <div class="item form-group">
        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">E-mail <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <input type="email" id="email" name="email" value="{{ auth()->user()->email }}" maxlenght="200" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="mail@exemplo.com, mail@exemplo.com.br" class="form-control" required="" />
        </div>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Senha 
        </label>
        <div class="col-md-6 col-sm-6 ">
        <input type="password" class="form-control" name="password" id="password" maxlength="32">
        </div>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Confirmar Senha 
        </label>
        <div class="col-md-6 col-sm-6 ">
        <input type="password" class="form-control" name="confirm_password" id="confirm_password" maxlength="32">
        </div>
    </div>

    <div class="ln_solid"></div>

    <div class="item form-group">
        <div class="col-md-6 col-sm-6 offset-md-3">
        <div style="text-align:center">
        <button type="submit" name="salvar" class="btn btn-info">
                <i class="fa fa-save"></i> Salvar
            </button>

            <a href="{{ route('profile') }}" class="btn btn-info">
                <i class="fa fa-arrow-left"></i> Voltar</a>
        </div>            
        </div>
    </div>    
</form>

@endsection
