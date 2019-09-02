@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{route('home')}}" class="btn btn-dark">Volta</a>
        <a href="{{route('category-create')}}" class="btn btn-primary">Novo</a>
        <hr>
        <table class="table table-bordered table-sm">
            <tbody>
                <tr>
                    <th style="width: 15px">#</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </tbody>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>
                        <a href="{{route('category-edit', ['id' => $category->id])}}" class="btn btn-dark">Editar</a>
                        <a href="{{route('category-show', ['id' => $category->id])}}" class="btn btn-danger">Deletar</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
