@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container">
            <h3 class="text-center">Grafico</h3>
            <div id="chart-div" style="width: 100%; height: 500px;"></div>
        </div>
    </div>
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
