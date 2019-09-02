@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{route('home')}}" class="btn btn-dark">Volta</a>
        <a href="{{route('receita-create')}}" class="btn btn-primary">Nova</a>
        <hr>

        <h3>Relação de Receitas</h3>
        <table class="table table-bordered table-sm">
            <tbody>
            <tr>
                <th style="width: 15px">#</th>
                <th>Data Lanc.</th>
                <th>Nome</th>
                <th class="text-right">Valor</th>
                <th class="text-center">Ações</th>
            </tr>
            </tbody>
            <tbody>
            @foreach($receitas as $receita)
                <tr>
                    <td>{{$receita->id}}</td>
                    <td>{{$receita->data_lancamento->format('d/m/Y')}}</td>
                    <td>{{$receita->name}}</td>
                    <td class="text-right">R$ {{number_format($receita->valor,2,',','.')}}</td>
                    <td class="text-center">
                        <a href="{{route('receita-edit', ['id' => $receita->id])}}" class="btn btn-dark">Editar</a>
                        <a href="{{route('receita-show', ['id' => $receita->id])}}" class="btn btn-danger">Deletar</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
