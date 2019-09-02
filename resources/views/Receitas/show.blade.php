@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{route('receita-index')}}" class="btn btn-primary">Volta</a>
        <a href="{{route('receita-edit', ['id' => $receita->id])}}" class="btn btn-dark">Editar</a>
        <a href="{{route('receita-delete', ['id' => $receita->id])}}" class="btn btn-danger">Deletar</a>
        <hr>
        <h3>Detalhes da Receita</h3>

        <table class="table table-sm table-bordered">
            <tbody>
            <tr>
                <th>#</th>
                <td>{{$receita->id}}</td>
            </tr>
            <tr>
                <th>Data Lancamento</th>
                <td>{{$receita->data_lancamento->format('d/m/Y')}}</td>
            </tr>
            <tr>
                <th>Nome</th>
                <td>{{$receita->name}}</td>
            </tr>
            <tr>
                <th>valor</th>
                <td >{{number_format($receita->valor,2,',','.')}}</td>
            </tr>
            <tr>
                <th>Criado</th>
                <td>{{$receita->created_at->format('d/m/Y')}}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
