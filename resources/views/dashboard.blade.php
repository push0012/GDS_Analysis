@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
<style>
  .card-header-secondary{

  }
  </style>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">school</i>
              </div>
              <p class="card-category">This Year / All</p>
              <h3 class="card-title">{{$degree_this_year->degree_all}} / {{$degree_all->degree_all}}
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-info">info</i>Graduated Registration
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">receipt_long</i>
              </div>
              <p class="card-category">This Year / All</p>
              <h3 class="card-title">
                {{$diploma_this_year->diploma_all}} / {{$diploma_all->diploma_all}}
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-info">info</i> Diploma Holder Registration
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats" style="display: none !important;">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">info_outline</i>
              </div>
              <p class="card-category">Fixed Issues</p>
              <h3 class="card-title">75</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">local_offer</i> All Student
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats" style="display: none !important;">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="fa fa-twitter"></i>
              </div>
              <p class="card-category">Followers</p>
              <h3 class="card-title">+245</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">update</i> Just Updated
              </div>
            </div>
          </div>
        </div>
      </div>
      <h4 class="text-danger" style="font-style:underline;"><b>Year Summery (for {{$this_year}})</b></h4>
      <div class="row">
        <div class="col-md-3">
          <div class="card card-chart">
            <div class="card-header " style="">
                <canvas id="district_chart"></canvas> 
            </div>
            <div class="card-body">
              <h4 class="card-title">by District</h4>
              <p class="card-category">
                <span class="text-success"><span class="material-icons">timeline</span> for {{$this_year}} Year</span></p>
            </div>
            <div class="card-footer">
              <div class="stats">
   
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card card-chart">
            <div class="card-header">
              <canvas id="gender_chart"></canvas> 
            </div>
            <div class="card-body">
              <h4 class="card-title">by Gender</h4>
              <p class="card-category">
                <span class="text-success">
                  <span class="material-icons">timeline</span> for {{$this_year}} Year
                </span>
              </p>
            
            </div>
            <div class="card-footer">
              <div class="stats">
                
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card card-chart">
            <div class="card-header">
              <canvas id="deg_type_chart"></canvas> 
            </div>
            <div class="card-body">
              <h4 class="card-title">by Degree Type</h4>
              <p class="card-category">
                <span class="text-success">
                  <span class="material-icons">timeline</span> for {{$this_year}} Year
                </span>
              </p>
            </div>
            <div class="card-footer">
              <div class="stats">
               
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card card-chart">
            <div class="card-header">
              <canvas id="deg_class_chart"></canvas> 
            </div>
            <div class="card-body">
              <h4 class="card-title">by Result</h4>
              <p class="card-category">
                <span class="text-success">
                  <span class="material-icons">timeline</span> for {{$this_year}} Year
                </span>
              </p>
            </div>
            <div class="card-footer">
              <div class="stats">
               
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-8">
          <div class="card card-chart">
            <div class="card-header ">
              <canvas id="stream_chart"></canvas>
            </div>
            <div class="card-body">
              <h4 class="card-title">by Stream</h4>
              <p class="card-category">
                <span class="text-success">
                  <span class="material-icons">timeline</span> for {{$this_year}} Year
                </span>
              </p>
            </div>
            <div class="card-footer">
              <div class="stats">
                
              </div>
            </div>
          </div>
        
          
        </div>
        <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header ">
              <canvas id="medium_chart"></canvas>
            </div>
            <div class="card-body">
              <h4 class="card-title">by Degree Medium</h4>
              <p class="card-category">
                <span class="text-success">
                  <span class="material-icons">timeline</span> for {{$this_year}} Year
                </span>
              </p>
            </div>
            <div class="card-footer">
              <div class="stats">
                
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-8">
          <div class="card card-chart">
            <div class="card-header ">
            <canvas id="year_chart"></canvas>
            </div>
            <div class="card-body">
              <h4 class="card-title">by Graduated Year</h4>
              <p class="card-category">
                <span class="text-success">
                  <span class="material-icons">timeline</span> for {{$this_year}} Year
                </span>
              </p>
            </div>
            <div class="card-footer">
              <div class="stats">
                
              </div>
            </div>
          </div>
        
          
        </div>
        <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header ">
              <canvas id="year_chart"></canvas>
            </div>
            <div class="card-body">
              <h4 class="card-title">Summery by Graduated Year</h4>
              <p class="card-category">
                <span class="text-success">
                  <span class="material-icons">timeline</span> for {{$this_year}} Year
                </span>
              </p>
            </div>
            <div class="card-footer">
              <div class="stats">
                
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection

@push('js')
  <script>
    //District Summery PIE Chart
    var canvas = document.getElementById("district_chart");
      var ctxpie = canvas.getContext('2d');
      var data = {
          labels: ["Ratnapura", "Kegalle"],
            datasets: [
              {
                  hoverBackgroundColor: [ '#dc3545b5', '#1a7be2c4'],
                  backgroundColor: [ '#dc3545b5', '#1a7be2c4'],
                  data: [{!! $ratnapura_count !!}, {!! $kegalle_count !!}],
                  borderColor:    ['#dc3545b5', '#1a7be2c4'],
                  borderWidth: [1,1]
              }
          ]
      };
      var options = {
      };
      var myBarChart = new Chart(ctxpie, {
          type: 'pie',
          data: data,
          options:{
          responsive: true,
          plugins: {
            legend: {
              position: 'top',
            },
          }
        },
      });

      //Gender Summery PIE Chart
      var canvas = document.getElementById("gender_chart");
      var ctxpie = canvas.getContext('2d');
      var data = {
          labels: ["Male", "Female"],
            datasets: [
              {
                  hoverBackgroundColor: [ '#0000ff', '#ff00ff'],
                  backgroundColor: [ '#0000ff', '#ff00ff'],
                  data: [{!! $male_count !!}, {!! $female_count !!}],
                  borderColor:    ['#0000ff', '#ff00ff'],
                  borderWidth: [1,1]
              }
          ]
      };
      var options = {
      };
      var myBarChart = new Chart(ctxpie, {
          type: 'pie',
          data: data,
          options:options
      });

      //degree type chart
      var canvas = document.getElementById("deg_type_chart");
      var ctxpie = canvas.getContext('2d');
      var data = {
          labels: ["General", "Special"],
            datasets: [
              {
                  hoverBackgroundColor: [ '#009900', '#663300'],
                  backgroundColor: [ '#009900', '#663300'],
                  data: [{!! $general_count !!}, {!! $special_count !!}],
                  borderColor:    ['#009900', '#663300'],
                  borderWidth: [1,1]
              }
          ]
      };
      var options = {
      };
      var myBarChart = new Chart(ctxpie, {
          type: 'pie',
          data: data,
          options:options
      });

      //degree class chart
      var canvas = document.getElementById("deg_class_chart");
      var ctxpie = canvas.getContext('2d');
      var data = {
          labels: ["First","2nd Upper", "2nd Lower", "General"],
            datasets: [
              {
                  hoverBackgroundColor: [ '#009900', '#663300','#0000ff', '#ff00ff'],
                  backgroundColor: [ '#009900', '#663300','#0000ff', '#ff00ff'],
                  data: [{!! implode(', ', $deg_class_count) !!}],
                  borderColor:    ['#009900', '#663300','#0000ff', '#ff00ff'],
                  borderWidth: [1,1]
              }
          ]
      };
      var options = {
      };
      var myBarChart = new Chart(ctxpie, {
          type: 'pie',
          data: data,
          options:options
      });

      //stream bar chart
      var ctxbar = document.getElementById("stream_chart").getContext('2d'); 
      var chart = new Chart(ctxbar, {
      type: 'bar',
      data: {
      labels: [{!! $stream_names->pluck('str_name')->transform(function ($item, $key) {return "'" . $item ."'"; })->implode(',') !!}],
      datasets: [{
         label: 'Stream',
         data: [{!! implode(', ', $str_count) !!}],
         //data: [1, 5,1, 3,1, 4,1, 7,1,9,1, 5,1, 11,1, 12],
         backgroundColor: 'rgba(255, 99, 132, 0.6)',
         hoverBackgroundColor: 'rgba(255, 99, 132, 0.9)',
         borderColor: 'rgba(255, 99, 132, 0.9)',
         borderRadius:'20px',
          borderWidth: 1
      }]
   },
   options: {
    plugins: {
         title: {
           display: false,
           text: 'Stream Summery'
         },
       },
      maintainAspectRatio: true,
      responsive: true,
      legend: {
         position: 'right' // place legend on the right side of chart
      },
      scales: {
         xAxes: [{
            stacked: true, // this should be set to make the bars stacked- 
         },
        ],
         yAxes: [{
            stacked: true, // this also..
            ticks: {
              stepSize: 1,
              
            },
         }]
      }
   }
});


//Medium bar chart
var canvas = document.getElementById("medium_chart"); 
var ctxpie = canvas.getContext('2d');
      var data = {
          labels: ['Sinhala','Tamil', 'English'],
            datasets: [
              {
                  hoverBackgroundColor: [ '#009900', '#663300','#0000ff'],
                  backgroundColor: [ '#009900', '#663300','#0000ff'],
                  data: [{!! implode(', ', $deg_medium_count) !!}],
                  borderColor:    ['#009900', '#663300','#0000ff'],
                  borderWidth: [1,1]
              }
          ]
      };
      var options = {
      };
      var myBarChart = new Chart(ctxpie, {
          type: 'pie',
          data: data,
          options:options
      });     

//year summery line chart
/*var ctxbar = document.getElementById("year_chart").getContext('2d'); 
      var chart = new Chart(ctxbar, {
      type: 'line',
      data: {
      labels: [{!! $stream_names->pluck('str_name')->transform(function ($item, $key) {return "'" . $item ."'"; })->implode(',') !!}],
      datasets: [{
         label: 'Stream',
         data: [{!! implode(', ', $str_count) !!}],
         //data: [1, 5,1, 3,1, 4,1, 7,1,9,1, 5,1, 11,1, 12],
         backgroundColor: 'rgba(255, 99, 132, 0.6)',
         hoverBackgroundColor: 'rgba(255, 99, 132, 0.9)',
         borderColor: 'rgba(255, 99, 132, 0.9)',
         borderRadius:'20px',
          borderWidth: 1
      }]
   },
   options: {
    plugins: {
         title: {
           display: false,
           text: 'Stream Summery'
         },
       },
      maintainAspectRatio: true,
      responsive: true,
      legend: {
         position: 'right' // place legend on the right side of chart
      },
      scales: {
         xAxes: [{
            stacked: true, // this should be set to make the bars stacked- 
         },
        ],
         yAxes: [{
            stacked: true, // this also..
            ticks: {
              stepSize: 1,
              
            },
         }]
      }
   }
});*/


    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush