@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{route('category-index')}}" class="btn btn-primary">Volta</a>
        <hr>
        <form action="{{route('category-store')}}" method="post">
            @csrf
            @include('Category._form')
            <button type="submit" class="btn btn-success">Cadastrar</button>
        </form>
    </div>
@endsection
