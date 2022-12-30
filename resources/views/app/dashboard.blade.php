@extends('app._layouts.base')

@section('content')

@section('title')
<h4 class="page-title">DASHBOARD</h4>
@endsection

@section('sub_title')
<h2>Simcompany Banking<small></small></h2>
@endsection

<div class="row">
    <div class="col-md-12">
        <div class="white-box">
            <div class="user-bg">
                <div class="overlay-box">
                    <div class="user-content text-center">

                        <div class="row top_tiles" style="margin: 10px 0;">
                            <div class="col-md-4 tile">
                                <span>Qnt. de Contas </span>
                                <h2>{{ $totalContas }}</h2>
                                <span class="sparkline_two" style="height: 160px;">
                                    <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                                </span>
                            </div>
                            <div class="col-md-4 tile">
                                <span>Total de Depósitos </span>
                                <h2>{{ $totalDepositos }}</h2>
                                <span class="sparkline_two" style="height: 160px;">
                                    <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                                </span>
                            </div>
                            <div class="col-md-4 tile">
                                <span>Total de Saques</span>
                                <h2>{{ $totalSaques }}</h2>
                                <span class="sparkline_three" style="height: 160px;">
                                    <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                                </span>
                            </div>
                        </div>

                        <div class="text-center">
                            <a href="{{ route ('createConta') }}" class="btn btn-info">
                                <i class="fa fa-plus"></i> Nova Conta</a>
                            <a href="{{ route ('createDeposito') }}" class="btn btn-info">
                                <i class="fa fa-money"></i> Depositar</a>
                            <a href="{{ route ('createSaque') }}" class="btn btn-info">
                                <i class="fa fa-money"></i> Sacar</a>
                            <br />
                            <br />
                        </div>
                        <hr>

                        <div class="card-box table-responsive">
                            <h2><strong>Minhas Contas</strong></h2>
                            <br />
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Nº Conta</th>
                                        <th>Tipo de Conta</th>
                                        <th>Saldo (R$)</th>
                                        <th width="10%">Cancelar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contas as $conta)
                                    <tr>
                                        <td>{{ $conta->conta_id }}</td>
                                        <td>{{ $conta->tipoConta }}</td>
                                        <td>{{ number_format( $conta->saldo, 2, ',', '.') }}</td>

                                        <td style="text-align:center">
                                            <form action="/app/contas/{{ $conta->conta_id }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class=""><a href="/app/contas/{{ $conta->conta_id }}">
                                                        <i class="fa fa-trash" onclick="return confirm('Deseja realmente Encerrar esta Conta?');" title="Encerrar Conta"></i></a></button>
                                            </form>
                                        </td>

                                        @endforeach
                                </tbody>
                            </table>
                            <br />
                            <div style="text-align:right">
                                <a href="{{ route('gerarPdf') }}" target="_blank" class="btn btn-info">
                                    <i class="fa fa-file-pdf-o"></i> Gerar Relatório</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection