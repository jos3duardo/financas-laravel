@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{route('despesa-create')}}" class="btn btn-success">Criar</a>
        <br><br>
        <h3>Relação de Despesa</h3>
        <table class="table table-bordered table-sm table-responsive-sm">
            <tbody>
            <tr>
                <th style="width: 15px" class="text-center">#</th>
                <th width="10%" class="text-center">Data Lanc.</th>
                <th>Nome</th>
                <th colspan="2" class="text-right">Valor</th>
                <th width="17%">Categoria</th>
                <th width="15%" class="text-center">Ações</th>
            </tr>
            </tbody>
            <tbody>
            @foreach($despesas as $despesa)
                <tr>
                    <td class="text-center">{{$despesa->id}}</td>
                    <td class="text-center">{{$despesa->data_lancamento->format('d/m/Y')}}</td>
                    <td>{{$despesa->name}}</td>
                    <td style="border-right: none !important; " width="4%">R$</td>
                    <td style="border-left: none !important;" width="13%" class="text-right" > {{ number_format($despesa->valor,2,',','.') }}</td>
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
