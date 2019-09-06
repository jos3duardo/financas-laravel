@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
            <form class="form-inline text-center" action="{{route('grafico-grafico')}}" method="post">
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
                        <button type="submit" class="btn btn-dark mt-4" style="margin-top: 1.5rem!important">Pesquisa</button>
                    </div>
                </div>
            </form>
        </div>
    <br><br>
    <div class="container">
        <h3 class="text-center">Grafico</h3>
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
