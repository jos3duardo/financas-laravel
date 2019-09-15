@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{route('despesa-index')}}" class="btn btn-primary">Volta</a>
        <hr>
        <h3>Nova Despesa</h3>
        <form action="{{route('despesa-store')}}" method="post">
            @csrf
            @include('Despesas._form')
            <button type="submit" class="btn btn-success btn-block">Cadastrar</button>
        </form>
    </div>
@endsection
