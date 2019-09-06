@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{route('home')}}" class="btn btn-primary col-sm-auto mb-2 ">Home</a>
        <a href="{{route('category-index')}}" class="btn btn-dark col-sm-auto mb-2 ">Centros de Custos</a>
        <a href="{{route('receita-index')}}" class="btn btn-dark col-sm-auto mb-2 ">Receitas</a>
        <a href="{{route('despesa-index')}}" class="btn btn-dark col-sm-auto mb-2 ">Despesas</a>
        <a href="{{route('grafico-index')}}" class="btn btn-dark col-sm-auto mb-2 ">Grafico</a>
        <hr>
        <h3>Extrato</h3>
        <div class="container-fluid">
        <form action="{{route('extrato-detalhes')}}" method="post">
            @csrf
            <div class="form-row">
                <div class="col-4 col-sm-auto">
                    <label for="inicio">Inicio</label>
                    <input type="text" id="inicio" name="inicio" class="form-control" value="{{date('d/m/Y', strtotime('-1 month'))}}">
                </div>
                <div class="col-4 col-sm-auto">
                    <label for="fim">Fim</label>
                    <input type="text" id="fim" name="fim" class="form-control" value="{{date('d/m/Y')}}">
                </div>
                <div class="col-auto col-sm-auto">
                    <button type="submit" class="btn btn-dark mt-4" style="margin-top: 2rem!important">Pesquisa</button>
                </div>
            </div>
        </form>
        </div>
        <hr>

        <table class="table table-bordered table-sm col-3 col-sm-6">
            <tr>
                <td colspan="2" class="text-center active" >Resumo</td>
            </tr>
            <tr>
                <th class="">Receitas</th>
                <td class="text-right "> R$ {{ number_format($total_receitas,2,'.','.') }}</td>
            </tr>
            <tr>
                <th class="">Despesas</th>
                <td class="text-right "> R$ {{ number_format($total_despesas,2,'.','.') }}</td>
            </tr>
            <tr>
                <th class="">Total</th>
                <td class="text-right "> R$ {{ number_format($total_receitas - $total_despesas,2,'.','.') }}</td>
            </tr>
        </table>

        <div class="row">
            <div class="col-md-6">
                <h5>Despesas</h5>
                <table class="table table-sm">
                    <thead>
                    <tr>
                        <th>Data</th>
                        <th>Descrição</th>
                        <th>Categoria</th>
                        <th>Valor</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($despesas as $despesa)
                        <tr>
                            <td>{{$despesa->data_lancamento}}</td>
                            <td>{{$despesa->name}}</td>
                            <td>{{$despesa->category_name}}</td>
                            <td>R$ - {{ number_format($despesa->valor,2,'.','.') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <h5>Receitas</h5>
                <table class="table table-sm">
                    <thead>
                    <tr>
                        <th>Data</th>
                        <th>Descrição</th>
                        <th>Valor</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($receitas as $receita)
                        <tr>
                            <td>{{$receita->data_lancamento}}</td>
                            <td>{{$receita->name}}</td>
                            <td>R$ + {{ number_format($receita->valor,2,'.','.') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>


    </div>
@endsection
