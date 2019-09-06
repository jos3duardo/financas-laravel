@extends('layouts.app')
@section('content')
    <div class="container">

        <a href="{{route('category-create')}}" class="btn btn-primary">Novo</a>
        <br><br>
        <table class="table table-bordered table-sm">
            <tbody>
                <tr>
                    <th style="width: 5%" class="text-center">#</th>
                    <th>Nome</th>
                    <th width="18%" class="text-center">Ações</th>
                </tr>
            </tbody>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td class="text-center">{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td class="text-center">
                        <a href="{{route('category-edit', ['id' => $category->id])}}" class="btn btn-dark">Editar</a>
                        <a href="{{route('category-show', ['id' => $category->id])}}" class="btn btn-danger">Deletar</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
