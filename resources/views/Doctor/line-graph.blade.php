@extends('Doctor.base')
    @section('Doctor','active')
@section('content')
        @if(session()->has('message'))
        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
            {{ session('message') }}
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">X</span>
            </button>
        </div>
       @endif


       <div class="container mt-4">
       <div id="container" style="height: 400px; width: 500px"></div>
       </div>


       <script>
      var date_data = @json($patient);
      var chart = new Highcharts.Chart({
        chart: {
            renderTo: "container",
            marginBottom: 80
        },

        xAxis: {
            categories: [
                date_data[0],
                date_data[1],
                date_data[2],
                date_data[3],
                // '1st day',
                // '2nd day',
                // '3rd day',
                // 'Today',
            ],

            labels: {
                rotation: 90
            }
        },

        series: [
            {
            data: [
                {{ $a->count() }},
                {{ $b->count() }},
                {{ $c->count() }},
                {{ $d->count() }},

            ]
            }
        ]
        });

  </script>

@endsection
