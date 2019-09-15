@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{route('category-index')}}" class="btn btn-primary">Volta</a>
        <a href="{{route('category-edit', ['id' => $category->id])}}" class="btn btn-dark">Editar</a>
        <a href="{{route('category-delete', ['id' => $category->id])}}" class="btn btn-danger">Deletar</a>
        <hr>
        <table class="table table-sm table-bordered">
            <tbody>
            <tr>
                <th>#</th>
                <td>{{$category->id}}</td>
            </tr>
            <tr>
                <th>Nome</th>
                <td>{{$category->name}}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
