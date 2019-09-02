@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{route('category-index')}}" class="btn btn-primary">Volta</a>
        <hr>
        <form action="{{route('category-update', ['id' => $category->id])}}" method="post">
            @csrf
            @include('Category._form')
            <button type="submit" class="btn btn-success">Editar</button>
        </form>
    </div>
@endsection
