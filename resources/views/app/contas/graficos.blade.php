@extends('app._layouts.base')

@section('content')

@section('title')
<h4 class="page-title">GRÁFICOS</h4>
@endsection

@section('sub_title')
<h2>Gráficos<small></small></h2>
@endsection

<div class="row">
    <div class="col-md-12">
        <div class="white-box">
            <div class="user-bg">
                <div class="overlay-box">
                    <div class="user-content text-center">

                        <h1>Em Construção ...</h1>
                        <a href="{{ route ('dashboard') }}" class="btn btn-info">
                            <i class="fa fa-arrow-left"></i> Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection