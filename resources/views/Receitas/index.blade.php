@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{route('receita-create')}}" class="btn btn-primary">Criar</a>
        <hr>

        <h3>Relação de Receitas</h3>
        <table class="table table-bordered table-sm">
            <tbody>
            <tr>
                <th style="width: 15px">#</th>
                <th width="10%">Data Lanc.</th>
                <th>Nome</th>
                <th colspan="2"  class="text-right">Valor</th>
                <th class="text-center" width="15%">Ações</th>
            </tr>
            </tbody>
            <tbody>
            @foreach($receitas as $receita)
                <tr>
                    <td>{{$receita->id}}</td>
                    <td>{{$receita->data_lancamento->format('d/m/Y')}}</td>
                    <td>{{$receita->name}}</td>
                    <td style="border-right: none !important; " width="5%">R$</td>
                    <td style="border-left: none !important;" width="20%" class="text-right" > {{ number_format($receita->valor,2,',','.') }}</td>
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
