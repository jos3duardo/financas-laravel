@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{route('home')}}" class="btn btn-dark">Volta</a>
        <a href="{{route('despesa-create')}}" class="btn btn-primary">Nova</a>
        <hr>

        <h3>Relação de Despesa</h3>
        <table class="table table-bordered table-sm">
            <tbody>
            <tr>
                <th style="width: 15px">#</th>
                <th>Data Lanc.</th>
                <th>Nome</th>
                <th class="text-right">Valor</th>
                <th>Categoria</th>
                <th class="text-center">Ações</th>
            </tr>
            </tbody>
            <tbody>
            @foreach($despesas as $despesa)
                <tr>
                    <td>{{$despesa->id}}</td>
                    <td>{{$despesa->data_lancamento->format('d/m/Y')}}</td>
                    <td>{{$despesa->name}}</td>
                    <td class="text-right">R$ {{number_format($despesa->valor,2,',','.')}}</td>
                    <td>{{$despesa->categoria->name}}</td>
                    <td class="text-center">
                        <a href="{{route('despesa-edit', ['id' => $despesa->id])}}" class="btn btn-dark">Editar</a>
                        <a href="{{route('despesa-show', ['id' => $despesa->id])}}" class="btn btn-danger">Deletar</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
