@extends('layouts.app')
@section('content')
    <div class="container">
        <h3 class="text-center">Extrato por periodo</h3>
        <br><br>
        <form action="{{route('extrato-detalhes')}}" method="post">
            @csrf
            <div class="row justify-content-center">
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

        <br><br>
        <h5 class="text-center" >Resumo</h5>
        <div class="row justify-content-center">
            <table class="table table-bordered table-sm col-7 ">
                <thead>
                    <tr class="text-center">
                        <th colspan="2">Total de Receitas</th>
                        <th colspan="2">Total de Despesas</th>
                        <th colspan="2">Total Geral</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td style="border-right: none !important; " width="5%">R$</td>
                    <td style="border-left: none !important;" class="text-right ">{{ number_format($total_receitas,2,'.','.') }}</td>
                    <td style="border-right: none !important; " width="5%">R$</td>
                    <td style="border-left: none !important;" class="text-right ">{{ number_format($total_despesas,2,'.','.') }}</td>

                    @if(($total_receitas - $total_despesas)>0)
                        <td style="border-right: none !important;" class="text-primary" width="5%">R$</td>
                        <td style="border-left: none !important;" class="text-right text-primary ">{{ number_format($total_receitas - $total_despesas,2,'.','.') }}</td>
                    @else
                        <td style="border-right: none !important;" class="text-danger" width="5%">R$</td>
                        <td style="border-left: none !important;" class="text-right text-danger">{{ number_format($total_receitas - $total_despesas,2,'.','.') }}</td>
                    @endif
                </tr>
                </tbody>
            </table>
        </div>
        <br><br>
        <div class="row">
            <div class="col-md-6">
                <h5 class="text-center text-danger">Despesas</h5>
                <table class="table table-sm table-bordered table-striped">
                    <thead>
                    <tr class="active">
                        <th width="10%">Data</th>
                        <th>Descrição</th>
                        <th>Categoria</th>
                        <th class="text-right" colspan="2">Valor</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($despesas as $despesa)
                        <tr>
                            <td>{{$despesa->data_lancamento->format('d/m/Y')}}</td>
                            <td>{{$despesa->name}}</td>
                            <td>{{$despesa->category_name}}</td>
                            <td style="border-right: none !important; " width="5%">R$</td>
                            <td style="border-left: none !important;" width="20%" class="text-right" > {{ number_format($despesa->valor,2,',','.') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <h5 class="text-center text-success">Receitas</h5>
                <table class="table table-sm table-bordered table-striped">
                    <thead>
                    <tr>
                        <th width="10%">Data</th>
                        <th>Descrição</th>
                        <th class="text-right" colspan="2">Valor</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($receitas as $receita)
                        <tr>
                            <td>{{$receita->data_lancamento->format('d/m/Y')}}</td>
                            <td>{{$receita->name}}</td>
                            <td style="border-right: none !important; " width="5%">R$</td>
                            <td style="border-left: none !important;" width="20%" class="text-right" >R$ {{ number_format($receita->valor,2,',','.') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>


    </div>
@endsection
