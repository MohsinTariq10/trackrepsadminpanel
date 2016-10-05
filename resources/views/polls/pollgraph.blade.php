@extends('layout.admin')

@section('content')

    <h3>Statistics of People from @if(!(empty($city))){{$city}}@endif</h3>
    <?php
    $total = 0;
    foreach ($options as $option) {
        $total += (int)$option[1];
    }
    ?>

    @foreach ($options as $option)
        <?php
        $i = 1;
        if ($total != 0)
                $value = round((((int)$option[1]) / $total) * 100, 1);
            else
                $value = 0;
        ?>
        <div class="col-sm-12">
            <div class="col-sm-4">
                <h2>{{$option[0]}}</h2>
            </div>
            <div class="col-sm-7">
                <br>
                <div class="row">
                    <div class="col-sm-10">
                        <div class="progress">
                            <div class="progress-bar progress-bar-success" role="progressbar"
                                 aria-valuenow="{{$value}}"
                                 aria-valuemin="0" aria-valuemax="100" style="width:{{$value}}%">
                                {{$value}}%
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">{{$option[1]}}</div>
                </div>
            </div>
        </div>
    @endforeach

    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        // Load the Visualization API and the corechart package.
        google.charts.load('current', {'packages': ['corechart']});
        // Set a callback to run when the Google Visualization API is loaded.
        google.charts.setOnLoadCallback(drawChart);
        // Callback that creates and populates a data table,
        // instantiates the pie chart, passes in the data and
        // draws it.
        function drawChart() {
            // Create the data table.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');
            data.addColumn('number', 'Slices');
            data.addRows([
                    @foreach ($options as $option)
                [{{$option[0]}},{{$option[1]}}]
                @endforeach
                {{--[{{$options[0][0]}}, {{$options[0][1]}}],--}}
                {{--[{{$options[1][0]}}, {{$options[1][1]}}],--}}
                {{--[{{$options[2][0]}}, {{$options[2][1]}}]--}}
                {{--['Zucchini', 1],--}}
                {{--['Pepperoni', 2]--}}
            ]);
            // Set chart options
            var options = {
                'title': 'Member Attendance',
                'width': 400,
                'height': 300
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
@endsection