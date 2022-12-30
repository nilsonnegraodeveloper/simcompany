@extends('app._layouts.base')

@section('content')

@section('title')    
      <h4 class="page-title">CONTAS</h4>
@endsection

@section('sub_title')
<h2>Depositar Valor<small></small></h2>
@endsection

  <form method="POST" action="{{ route('storeDeposito') }}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
    @csrf

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nome">Conta <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">            
            <select name="conta_id" class="form-control" value="{{ old('conta_id') }}" required="">
                <option value=""> -- Selecione uma Conta -- </option>
                @foreach ($contas as $conta)
                    <option value="{{ $conta->conta_id }}">Nº da Conta: {{ $conta->conta_id }} - Tipo da Conta: {{ $conta->tipoConta }}</option>
                @endforeach
            </select>        
        </div>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nome">Valor (R$) <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="text" id="money" value="{{ old('valor') }}" name="valor" maxlenght="20" class="form-control" required=""/>
        </div>
    </div>

    <div class="ln_solid"></div>
    
    <div class="item form-group">
        <div class="col-md-6 col-sm-6 offset-md-3">
        <div style="text-align:center">
        <button type="submit" name="salvar" class="btn btn-info">
                <i class="fa fa-save"></i> Salvar
            </button>

            <a href="{{ route('dashboard') }}" class="btn btn-info">
                <i class="fa fa-arrow-left"></i> Voltar</a>
        </div>            
        </div>
    </div>
</form>
@endsection
