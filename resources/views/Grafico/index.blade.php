@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{route('home')}}" class="btn btn-primary">Home</a>
        <a href="{{route('category-index')}}" class="btn btn-dark">Centros de Custos</a>
        <a href="{{route('receita-index')}}" class="btn btn-dark">Receitas</a>
        <a href="{{route('despesa-index')}}" class="btn btn-dark">Despesas</a>
        <a href="{{route('extrato-index')}}" class="btn btn-dark">Extrato</a>
        <hr>
        <h3>Grafico</h3>
        <div class="row">
            <div class="center">
                <form class="form-inline text-center" action="{{route('grafico-grafico')}}" method="post">
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

        <div id="chart-div" style="width: 100%; height: 500px;"></div>
    </div>
@endsection
@section('script')
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        // Load the Visualization API and the corechart package.
        google.charts.load('current', {'packages':['corechart']});
        // Set a callback to run when the Google Visualization API is loaded.
        google.charts.setOnLoadCallback(drawChart);

        function drawChart(){
            var data = new google.visualization.DataTable();
            data.addColumn('string','Categoria');
            data.addColumn('number','Valor');
            data.addRows([
                @foreach($categories as $category)
                    ['{{ $category->name }}', {{ $category->valor }} ],
                @endforeach
            ]);
            var options = {
                title: 'Gastos por Categoria',
                is3D: true,
            };
            var chart = new google.visualization.PieChart(document.getElementById('chart-div'));
            chart.draw(data, options);
        }

    </script>
@endsection
