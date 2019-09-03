@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{route('home')}}" class="btn btn-primary">Home</a>
        <a href="{{route('category-index')}}" class="btn btn-dark">Centros de Custos</a>
        <a href="{{route('receita-index')}}" class="btn btn-dark">Receitas</a>
        <a href="{{route('despesa-index')}}" class="btn btn-dark">Despesas</a>
        <hr>
        <h3>Extrato</h3>
        <div class="row">
            <div class="col-md-8">
                <form class="form-inline text-center" action="{{route('extrato-detalhes')}}" method="post">
                @csrf
                    <div class="form-group">
                        <label for="inicio" class="col-form-label">Inicio</label>
                        <input type="text" id="inicio" name="inicio" class="form-control" value="{{date('d/m/Y', strtotime('-1 month'))}}">
                    </div>
                    <div class="form-group">
                        <label for="fim" class="col-form-label">Fim</label>
                        <input type="text" id="fim" name="fim" class="form-control" value="{{date('d/m/Y')}}">
                    </div>
                <button type="submit" class="btn btn-dark">Pesquisa</button>
                </form>
            </div>
        </div>
        <hr>
                <h2>Totais no periodo</h2>
                <p>
                    <strong>Receitas:</strong>
                    R$ {{ number_format($total_receitas,2,'.','.') }}
                </p>
                <p>
                    <strong>Despesas:</strong>
                    R$ {{ number_format($total_despesas,2,'.','.') }}
                </p>
                <p>
                    <strong>Total:</strong>
                    R$ {{ number_format($total_receitas - $total_despesas,2,'.','.') }}
                </p>
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="row">--}}
{{--            <div class="col-md-8 col-md-offset-2">--}}
                <div class="list-group">
                    @foreach($despesas as $despesa)
                            <a href="" class="list-group-item">
                                <h6 class="list-group-item-heading">
                                    {{$despesa->data_lancamento}} - {{$despesa->name}}
                                </h6>
                                <p class="list-group-item-text">{{$despesa->category_name}}</p>
                                <h6 class="text-right">
                                    <span class="alert alert-danger">R$ - {{ number_format($despesa->valor,2,'.','.') }} </span>
                                </h6>
                            </a>
                    @endforeach
                        @foreach($receitas as $receita)
                            <a href="" class="list-group-item">
                                <h6 class="list-group-item-heading">
                                    {{$receita->data_lancamento}} - {{$receita->name}}
                                </h6>
                                <h6 class="text-right">
                                    <span class="alert alert-success">R$ + {{ number_format($receita->valor,2,'.','.') }} </span>
                                </h6>
                            </a>
                        @endforeach
                </div>
            </div>
{{--        </div>--}}
{{--    </div>--}}
@endsection
