@extends('layouts.app')
@section('content')
    <div class="container">
        <h3>Editar Despesa</h3>

        <form action="{{route('despesa-update', ['id' => $despesa->id])}}" method="post">
            @csrf
            @include('Despesas._form')
            <button type="submit" class="btn btn-success btn-block">Editar</button>
        </form>
    </div>
@endsection
