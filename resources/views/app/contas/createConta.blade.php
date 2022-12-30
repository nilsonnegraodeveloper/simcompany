@extends('app._layouts.base')

@section('content')

@section('title')    
      <h4 class="page-title">CONTAS</h4>
@endsection

@section('sub_title')
<h2>Nova Conta<small></small></h2>
@endsection

  <form method="POST" action="{{ route('storeConta') }}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
    @csrf

    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}" />

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nome">Tipo de Conta <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">            
            <select name="tipo_conta_id" class="form-control" value="{{ old('tipo_conta_id') }}" required="">
                <option value=""> -- Selecione um Tipo de Conta -- </option>
                @foreach ($tipoContas as $tipoConta)
                    <option value="{{ $tipoConta->id }}">{{ $tipoConta->nome }}</option>
                @endforeach
            </select>        
        </div>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nome">Valor (R$) <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="text" id="money" value="{{ old('saldo') }}" name="saldo" maxlenght="20" class="form-control" required=""/>
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
