@extends('layouts.admin')

@section('content')
  <!-- start head content         -->
  <div class="col-lg-4">
    <!-- avtive -->
    <div class="activeMode">
      @if (!empty($data))
        @if ($data[0]->purchase_count>0)
          <div class="card">
            <h1>active Mode</h1>
            <a href="{{url('admin/config')}}" class="btn btn-primary">your on Activate</a>
          </div>
          @else
            <div class="card">
              <h1>Deactivate Mode</h1>
              <a href="{{url('admin/config')}}" class="btn btn-info">Activate now</a>
            </div>
        @endif
      @else
        <div class="card">
          <h1>Deactivate Mode</h1>
          <a href="{{url('admin/config')}}" class="btn btn-info">Activate now</a>
        </div>
      @endif
    </div>
    <!-- end active -->
    <!-- Regster Users -->
    <div class="regsterUsers">
      <div class="card">
        <div class="card-top">
          <h1>{{count($user)}}</h1>
          <i class="fa fa-users"></i>
        </div>
        <div class="card-bottom">
          <p>New Registered Users This Month</p>
        </div>
      </div>
    </div>
    <!-- end  Regster Users-->
  </div>
  <div class="col-lg-8">
    <div id="money">
      <div class="card">
        @php
          \Stripe\Stripe::setApiKey("sk_test_N6nJbeU9iR3vH0xagEvs0TY0");
          $custmer = \Stripe\BalanceTransaction::all();
          $data = $custmer['data'];

          $array = [];
          foreach ($data as $data) {
            $array[] = $data['created'];
          }
        @endphp
        <div id="chart" style="width:100%; height:270px;"></div>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script type="text/javascript">
          // start with chart
          var myChart = Highcharts.chart('chart', {
                chart: {
                    type: 'areaspline'
                },
                title: {
                    text: ''
                },
                xAxis: {
                    // categories: ['1', '2', '3','4', '5', '6']
                },
                yAxis: {
                    title: {
                        text: ''
                    }
                },
                series: [{
                    name: 'Earning',
                    data: {{json_encode($array)}}
                }]
            });
          // end with chart
        </script>
      </div>
    </div>
  </div>
  <!-- end head content -->
  <!-- start analytics -->
  <div class="col-lg-3">
    <div class="analytics">
      <div class="card">
        <div class="icon"><i class="fa fa-video"></i></div>
        <div class="text">
          <h1>{{count($video)}}</h1>
          <p>Total Movies</p>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3">
    <div class="analytics">
      <div class="card">
        <div class="icon"><i class="fab fa-vimeo-v"></i></div>
        <div class="text">
          <h1>{{count($tv)}}</h1>
          <p>Total Tv-Series</p>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3">
    <div class="analytics">
      <div class="card">
        <div class="icon"><i class="fa fa-users"></i></div>
        <div class="text">
          <h1>{{count($cat)}}</h1>
          <p>Total categorys</p>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3">
    <div class="analytics">
      <div class="card">
        <div class="icon"><i class="fa fa-envelope"></i></div>
        <div class="text">
          <h1>{{count($inbox)}}</h1>
          <p>Total emails</p>
        </div>
      </div>
    </div>
  </div>
  <!-- end analytics -->
@endsection
