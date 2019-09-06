@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{route('category-index')}}" class="btn btn-dark">Centros de Custos</a>
                    <a href="{{route('receita-index')}}" class="btn btn-dark">Receitas</a>
                    <a href="{{route('despesa-index')}}" class="btn btn-dark">Despesas</a>
                    <a href="{{route('extrato-index')}}" class="btn btn-dark">Extrato</a>
                    <a href="{{route('grafico-index')}}" class="btn btn-dark">Grafico</a>
                </div>
            </div>
    </div>
</div>
@endsection
