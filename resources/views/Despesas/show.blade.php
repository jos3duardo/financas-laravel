@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{route('despesa-edit', ['id' => $despesa->id])}}" class="btn btn-dark">Editar</a>
        <a href="{{route('despesa-delete', ['id' => $despesa->id])}}" class="btn btn-danger">Deletar</a>
        <hr>
        <h3>Detalhes da Despesa</h3>

        <table class="table table-sm table-bordered">
            <tbody>
            <tr>
                <th>Id</th>
                <td>{{$despesa->id}}</td>
            </tr>
            <tr>
                <th>Data Lancamento</th>
                <td>{{$despesa->data_lancamento->format('d/m/Y')}}</td>
            </tr>
            <tr>
                <th>Nome</th>
                <td>{{$despesa->name}}</td>
            </tr>
            <tr>
                <th>valor</th>
                <td >{{number_format($despesa->valor,2,',','.')}}</td>
            </tr>
            <tr>
                <th>Criado</th>
                <td>{{$despesa->created_at->format('d/m/Y')}}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
