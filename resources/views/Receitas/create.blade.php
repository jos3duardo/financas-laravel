@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{route('receita-index')}}" class="btn btn-primary">Volta</a>
        <hr>
        <h3>Nova Receita</h3>
        <form action="{{route('receita-store')}}" method="post">
            @csrf
            @include('Receitas._form')
            <button type="submit" class="btn btn-success btn-block">Cadastrar</button>
        </form>
    </div>
@endsection
